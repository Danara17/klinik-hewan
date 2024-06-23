<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/midtrans/callback', [InvoiceController::class, 'callback'])->name('midtrans-callback');

Route::get('/tes', function () {
    return json_encode(base64_encode(config('midtrans.server_key')));
});