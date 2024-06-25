<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\Payment;
use App\Models\PrescriptionItem;
use Carbon\Carbon;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Invoice';
        return view('dashboard.admin.invoice.index', [
            'avatar' => $avatar,
            'page_title' => $title
        ]);
    }

    // 
    public function create($id)
    {
        // dd($id);
        $data = MedicalRecord::findOrFail($id);
        $avatar = Gravatar::get(auth()->user()->email);
        $prescriptions = PrescriptionItem::with('inventoryItem')->where('medical_record_id', $id)->get();
        $title = 'Create Invoice';

        return view('dashboard.admin.invoice.create', [
            'avatar' => $avatar,
            'page_title' => $title,
            'data' => $data,
            'prescriptions' => $prescriptions
        ]);
    }

    // 
    public function store(Request $request)
    {
        $med = MedicalRecord::findOrFail($request->medical_record_id);
        $owner_name = $med->pet->owner->name;
        $owner_phone = $med->pet->owner->phone;
        $owner_email = $med->pet->owner->email;
        $pet_name = $med->pet->name;

        $name = 'Pembayaran Rekam Medis Pasien ' . $request->pet_name;
        $description = 'Pasien ' . $request->pet_name . ' memiliki keluhan dari pemilik yaitu ' . $request->complaint . ' sehingga doktor ' . $request->doctor_name . ' mendiagnosis ' . $request->diagnosis;
        $request['invoice_date'] = now();
        $request['invoice_number'] = 'INV-' . Carbon::now()->format('YmdHis');
        // dd($request->all());
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'medical_record_id' => 'required|exists:medical_records,id',
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'total_amount' => 'required|numeric|min:0',
            'invoice_date' => 'required|date',
        ]);

        MedicalRecord::where('id', $request->medical_record_id)->update([
            'status_pembayaran' => 'menunggu_pembayaran'
        ]);

        $new_payment = new Payment();
        $new_payment->name = $name;
        $new_payment->description = $description;
        $new_payment->medical_record_id = $request->medical_record_id;
        $new_payment->status = 'waiting';
        $new_payment->payment_date = now();
        $new_payment->total_amount = $request->total_amount;
        $new_payment->metode_pembayaran = '';
        $new_payment->save();

        // Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $uniqueOrderId = 'ORDER-' . $request->medical_record_id . '-' . time() . '/' . $request->medical_record_id;

        $params = array(
            'transaction_details' => array(
                'order_id' => $uniqueOrderId,
                'gross_amount' => $request->total_amount,
            ),
            'customer_details' => array(
                'name' => $owner_name,
                'phone' => $owner_phone,
                'email' => $owner_email,
                'pet' => $pet_name
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // End Midtrans

        // Create a new invoice record
        $invoice = new Invoice();
        $invoice->user_id = $request->user_id;
        $invoice->medical_record_id = $request->medical_record_id;
        $invoice->invoice_number = $snapToken;
        $invoice->total_amount = $request->total_amount;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->save();

        // Return a success response with the created invoice data
        return redirect()->route('medical_record.index')->with('success', 'Invoice Berhasil dibuat');
    }

    public function pay($invoiceNumber)
    {
        $data = Invoice::where('invoice_number', $invoiceNumber)
            ->with(['medicalRecord.pet.owner'])
            ->firstOrFail();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Pay Invoice';
        // dd($data);
        return view('dashboard.guest.invoice.pay', [
            'avatar' => $avatar,
            'page_title' => $title,
            'data' => $data,
        ]);
    }

    public function callback(Request $request)
    {
        // Logging untuk debugging
        Log::info('Permintaan callback diterima', $request->all());

        // Ekstrak medical_record_id dari order_id
        $orderParts = explode('/', $request->order_id);
        $medicalRecordId = end($orderParts);

        // Validasi signature_key
        $serverKey = config('midtrans.server_key');
        $expectedHash = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($expectedHash !== $request->signature_key) {
            Log::error('Kunci tanda tangan tidak valid', ['request' => $request->all()]);
            return response()->json(['message' => 'Tanda Tangan Tidak Valid'], 401);
        }

        // Proses berdasarkan status transaksi
        switch ($request->transaction_status) {
            case 'capture':
            case 'settlement':
                // Perbarui status invoice dan rekam medis
                Invoice::where('medical_record_id', $medicalRecordId)->update(['status' => 'lunas']);
                MedicalRecord::where('id', $medicalRecordId)->update(['status_pembayaran' => 'menunggu_konfirmasi']);
                Payment::where('medical_record_id', $medicalRecordId)->update([
                    'metode_pembayaran' => $request->payment_type,
                ]);
                break;
            case 'expire':
                Log::info('Transaksi kadaluwarsa', ['order_id' => $request->order_id]);
                Invoice::where('medical_record_id', $medicalRecordId)->update(['status' => 'expire']);
                return response()->json(['message' => 'Transaksi Kadaluwarsa'], 200);
            default:
                Log::info('Status transaksi tidak dapat diproses', ['transaction_status' => $request->transaction_status]);
                return response()->json(['message' => 'Status Transaksi Tidak Dapat Diproses'], 200);
        }

        // Tanggapi dengan pesan sukses
        return response()->json(['message' => 'Sukses'], 200);
    }


    public function callbackMidtrans(Request $request)
    {
        dd($request->all());
    }
}