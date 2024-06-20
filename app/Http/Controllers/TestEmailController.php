<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\TestMail;

class TestEmailController extends Controller
{
    public function sendTestEmail()
    {
        // Debugging: Log mail configuration
        Log::info('Mail configuration: ', config('mail.mailers.smtp'));

        Mail::raw('ini email klinik hewan.', function ($message) {
            $message->to('Informatikat51@gmail.com')
                    ->subject('email klinik hewan');
        });

        return 'Email sent successfully!';
    }
}
