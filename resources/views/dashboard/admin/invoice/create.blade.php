@extends('dashboard.template.main')
@section('content')
    <div class="flex justify-between">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.show') }}"
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
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Create</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">

    <form action="{{ route('invoice.store') }}" method="POST">
        @csrf

        <input type="text" value="{{ $data->id }}" name="medical_record_id" hidden>
        <input type="text" value="{{ $data->pet->owner->id }}" name="user_id" hidden>

        <div class="mb-3">
            <label for="pet_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Pet
            </label>
            <input type="text" id="pet_name" name="pet_name" readonly value="{{ $data->pet->name }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-3">
            <label for="check_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Check Date
            </label>
            <input type="text" id="check_date" name="check_date" readonly value="{{ $data->check_date }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-3">
            <label for="doctor_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Doctor
            </label>
            <input type="text" id="doctor_name" name="doctor_name" readonly value="{{ $data->doctor->name }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-3">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Status Perawatan
            </label>
            <input type="text" id="status" name="status" readonly value="{{ $data->status_perawatan }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-3">
            <label for="complaint" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Complaint
            </label>
            <input type="text" id="complaint" name="complaint" readonly value="{{ $data->complaint }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-3">
            <label for="diagnosis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Diagnosis
            </label>
            <input type="text" id="diagnosis" name="diagnosis" readonly value="{{ $data->diagnosis }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>

        <div class="mb-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Prescription
            </label>
            <div class="overflow-x-auto dark:text-white">
                <table id="myTable"
                    class="table-auto min-w-full dark:bg-gray-800 text-center border border-gray-300 dark:border-gray-600">
                    <thead>
                        <tr>
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
                        @foreach ($prescriptions as $item)
                            <tr>
                                <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                    {{ $item->inventoryItem->name }}
                                </td>
                                <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                    Rp. {{ number_format($item->inventoryItem->harga, 0, ',', '.') }}
                                </td>
                                <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                    {{ $item->quantity }}
                                </td>
                                <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                    Rp. {{ number_format($item->inventoryItem->harga * $item->quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                            @php
                                $tot += $item->inventoryItem->harga * $item->quantity;
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="3" class="border-b border-gray-300 dark:border-gray-600 p-2"></td>
                            <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                <strong>
                                    Rp. {{ number_format($tot, 0, ',', '.') }}
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <input type="text" value="{{ $tot }}" name="total_amount" hidden>

        <div class="flex justify-end my-10">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Send Invoice
            </button>
        </div>

    </form>
@endsection
