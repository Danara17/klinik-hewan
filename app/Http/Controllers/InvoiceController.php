<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\PrescriptionItem;
use Carbon\Carbon;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

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



        // Create a new invoice record
        $invoice = Invoice::create($validatedData);
        MedicalRecord::where('id', $request->medical_record_id)->update([
            'status_pembayaran' => 'menunggu_pembayaran'
        ]);
        // Return a success response with the created invoice data
        return redirect()->route('medical_record.index')->with('success', 'Invoice Berhasil dibuat');
    }
}
