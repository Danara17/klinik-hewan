@extends('dashboard.template.main')


@section('dashboard')
    <div class="p-4 sm:ml-64 bg-slate-50 dark:bg-gray-800 min-h-screen">
        {{-- Card Info --}}


        <div class="grid grid-cols-1 gap-4 mt-14">
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="font-semibold text-black dark:text-white mb-3">
                    My Invoice
                </div>
                @if (count($data) > 0)
                    @foreach ($data as $item)
                        <a href="{{ route('invoice.pay', $item->invoice_number) }}"
                            class="flex flex-col md:flex-row p-5 mb-5 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 ease-in-out bg-white dark:bg-gray-800">
                            <div class="h-36 w-36 overflow-hidden rounded-lg mb-4 md:mb-0 md:mr-5">
                                <img src="{{ asset('storage/client_pets_gallery/' . $item->medicalRecord->pet->photo) }}"
                                    alt="{{ $item->medicalRecord->pet->name }}" class="h-full w-full object-cover">
                            </div>
                            <div class="flex flex-col justify-between w-full">
                                <div>
                                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-200 mb-2">
                                        <span class="mr-2">
                                            {{ $item->invoice_number }}
                                        </span>
                                        @if ($item->medicalRecord->status_pembayaran == 'menunggu_pembayaran')
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                Menunggu Pembayaran Anda
                                            </span>
                                        @else
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                Transaksi Selesai
                                            </span>
                                        @endif
                                    </div>
                                    <div>
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <tbody>
                                                <tr>
                                                    <td class="py-1 pr-4 font-medium text-gray-900 dark:text-white">Pasien
                                                    </td>
                                                    <td class="py-1">: {{ $item->medicalRecord->pet->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 pr-4 font-medium text-gray-900 dark:text-white">Keluhan
                                                    </td>
                                                    <td class="py-1">: {{ $item->medicalRecord->complaint }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 pr-4 font-medium text-gray-900 dark:text-white">Tanggal
                                                        Check</td>
                                                    <td class="py-1">: {{ $item->medicalRecord->check_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1 pr-4 font-medium text-gray-900 dark:text-white">Diagnosa
                                                    </td>
                                                    <td class="py-1">: {{ $item->medicalRecord->diagnosis }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="text-xl md:text-3xl text-green-600 dark:text-white flex justify-end mt-4">
                                    <strong>Rp. {{ number_format($item->total_amount, 0, '', '.') }}</strong>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <em>Belum ada Tagihan</em>
                @endif
            </div>
        </div>
    </div>
@endsection()
