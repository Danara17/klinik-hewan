@extends('dashboard.template.main')

@section('link-css')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endsection

@section('content')
    <div class="flex justify-between">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.show.user') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('invoice.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                            Invoice
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href=""
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                            Create
                        </a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>


    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">
    <div class="flex w-full justify-between align-items-center">
        <div class="text-5xl">Invoice</div>
        <div class="">
            <div>Indonesia, Jawa Timur, Surabaya</div>
            <div>{{ now() }}</div>
        </div>
    </div>
    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">
    <div class="flex w-full justify-between align-items-center">
        <div>
            <div class="text-base">Bill To: </div>
            <div class="text-xl">
                <strong>{{ $data->medicalRecord->pet->owner->name }}</strong>
            </div>
        </div>
        <div class="text-end">
            <div>
                <strong>Invoice #{{ $data->invoice_number }}</strong>
            </div>
            <div>
                {{ $data->medicalRecord->check_date }}
            </div>
        </div>
    </div>
    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">


    <div class="mb-3">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prescription</label>
        <div class="overflow-x-auto dark:text-white">
            <table id="myTable"
                class="table-auto min-w-full dark:bg-gray-800 text-center border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">#</th>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">Items</th>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">Price</th>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">Quantity</th>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $tot = 0;
                    @endphp
                    @foreach ($data->medicalRecord->prescriptionItems as $item)
                        <tr>
                            <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                {{ $loop->iteration }}
                            </td>
                            <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                {{ $item->inventoryItem->name }}</td>
                            <td class="border-b border-gray-300 dark:border-gray-600 p-2">Rp.
                                {{ number_format($item->inventoryItem->harga, 0, ',', '.') }}</td>
                            <td class="border-b border-gray-300 dark:border-gray-600 p-2">{{ $item->quantity }}</td>
                            <td class="border-b border-gray-300 dark:border-gray-600 p-2">Rp.
                                {{ number_format($item->inventoryItem->harga * $item->quantity, 0, ',', '.') }}</td>
                        </tr>
                        @php
                            $tot += $item->inventoryItem->harga * $item->quantity;
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="4" class="border-b border-gray-300 dark:border-gray-600 p-2"></td>
                        <td class="border-b border-gray-300 dark:border-gray-600 p-2"><strong>Rp.
                                {{ number_format($tot, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <input type="text" value="{{ $tot }}" name="total_amount" hidden>
    <input type="text" value="{{ $data->medicalRecord->id }}" name="id_med" hidden>
    <div class="flex justify-end my-10">
        {{-- <button type="submit"
            class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Pay Now !
        </button> --}}
        <button id="pay-button"
            class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Pay Now !
        </button>

        <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
        <div id="snap-container"></div>

    </div>
@endsection


@section('script-js')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $data->invoice_number }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    window.location.href = 'http://127.0.0.1:8000/dashboard/user/preview';
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
