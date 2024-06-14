<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Payment;
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
}
