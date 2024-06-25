<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Payment;
use Carbon\Carbon;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Transaction';
        $transaction = Payment::all();
        return view('dashboard.admin.payment.index', [
            'page_title' => $title,
            'avatar' => $avatar,
            'transaction' => $transaction
        ]);
    }

    public function create()
    {

    }

    public function confirm(Request $request)
    {
        $id = $request->id;
        $med_id = $request->med_id;
        Payment::findOrFail($id)->update([
            'status' => 'success'
        ]);
        MedicalRecord::findOrFail($med_id)->update([
            'status_pembayaran' => 'selesai'
        ]);
        return redirect()->back()->with('success', 'Transaksi Terkonfirmasi');
    }

    public function bayar(Request $request)
    {
        $med = MedicalRecord::findOrFail($request->medical_record_id);
        $owner_name = $med->pet->owner->name;
        $owner_phone = $med->pet->owner->phone;
        $owner_email = $med->pet->owner->email;
        $pet_name = $med->pet->name;

        $name = 'Pembayaran Rekam Medis Pasien ' . $request->pet_name;
        $description = 'Pasien ' . $request->pet_name . ' memiliki keluhan dari pemilik yaitu ' . $request->complaint . ' sehingga doktor ' . $request->doctor_name . ' mendiagnosis ' . $request->diagnosis;
        $new_payment = new Payment();
        $new_payment->name = $name;
        $new_payment->description = $description;
        $new_payment->medical_record_id = $request->medical_record_id;
        $new_payment->status = 'success';
        $new_payment->payment_date = now();
        $new_payment->total_amount = $request->total_amount;
        $new_payment->metode_pembayaran = 'Cash';
        $new_payment->save();

        // Update the status_pembayaran field of the medical record and save it
        $med->status_pembayaran = 'selesai';
        $med->save();

        return redirect()->route('payment.index')->with('success', 'Pembayaran Berhasil dicatat');
    }

    public function history()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'History of Transactions';
        $transaction = Payment::where('status', 'success');
        dd($transaction);
        return view('dashboard.admin.payment.history', [
            'page_title' => $title,
            'avatar' => $avatar,
            'transaction' => $transaction
        ]);
    }
}
