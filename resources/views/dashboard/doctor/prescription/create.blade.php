@extends('dashboard.template.main')

@section('content')
    <div class="flex justify-between">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.show.doctor') }}"
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
                        <a href="{{ route('prescription.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Prescription</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="#"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Create</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">
    <form action="{{ route('prescription.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        @if (session('success'))
            <div id="alert-border-3"
                class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <input type="text" value="{{ $id }}" name="med_id" hidden>

        <div class="flex flex-col">
            <div class="flex items-center">
                <div class="w-1/3 sm:w-auto"><strong>Owner</strong> :</div>
                <div class="w-2/3">{{ $med->pet->owner->name }}</div>
            </div>
            <div class="flex items-center">
                <div class="w-24 sm:w-auto mt-2 sm:mt-0"><strong>Pet</strong> :</div>
                <div>{{ $med->pet->name }}</div>
            </div>
            <div class="flex items-center">
                <div class="w-24 sm:w-auto mt-2 sm:mt-0"><strong>Check Date</strong> :</div>
                <div>
                    @php
                        $checkDate = \Carbon\Carbon::parse($med->check_date);
                    @endphp
                    {{ $checkDate->diffForHumans() }}
                </div>
            </div>
            <div class="mt-2"><strong>Diagnose</strong> : {{ $med->diagnosis }}</div>
        </div>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="overflow-x-auto dark:text-white">
            <table id="myTable"
                class="table-auto min-w-full dark:bg-gray-800 text-center border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">Items</th>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">Quantity</th>
                        <th class="px-4 py-2 border-b border-gray-300 dark:border-gray-600">Ops</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                            <select name="items[0][id_item]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Item</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <p class="text-xs text-red-500">{{ $messquantity }}</p>
                            @enderror
                        </td>
                        <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                            <input type="number" name="items[0][quantity]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            @error('quantity')
                                <p class="text-xs text-red-500">{{ $messquantity }}</p>
                            @enderror
                        </td>
                        <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                            <button type="button" id="add"
                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                + Add Items
                            </button>
                        </td>
                    </tr>
                    @if ($prescriptions)
                        @foreach ($prescriptions as $index => $prescription)
                            <tr>
                                <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                    <select name="items[{{ $index }}][id_item]" disabled
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Pilih Item</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $prescription->inventory_items_id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <p class="text-xs text-red-500">{{ $messquantity }}</p>
                                    @enderror
                                </td>
                                <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                    <input type="number" name="items[{{ $index }}][quantity]" disabled
                                        value="{{ $prescription->quantity }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                    @error('quantity')
                                        <p class="text-xs text-red-500">{{ $messquantity }}</p>
                                    @enderror
                                </td>
                                <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                                    <a href="{{ route('prescription.destroy', ['id' => $prescription->id, 'med_id' => $id]) }}"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif


                </tbody>
            </table>
        </div>

        <div class="flex justify-end my-10">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Update
            </button>
        </div>

    </form>
@endsection

@section('script-js')
    @php
        $itemsJson = json_encode($items);
    @endphp
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var i = {{ count($prescriptions) }}; // Start from the number of existing prescriptions
            var itemId = {{ count($prescriptions) }}; // Start from the number of existing prescriptions

            // Populate initial select options
            var items = {!! $itemsJson !!};

            // Add new rows dynamically
            $('#add').click(function() {
                ++i;
                ++itemId; // Increment itemId with each new item

                $('#myTable tbody').append(
                    `<tr>
                        <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                            <select name="items[` + itemId + `][id_item]"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>Pilih Item</option>
                            </select>
                            @error('name')
                                <p class="text-xs text-red-500">{{ $messquantity }}</p>
                            @enderror
                        </td>
                        <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                            <input type="number" name="items[` + itemId + `][quantity]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            @error('quantity')
                                <p class="text-xs text-red-500">{{ $messquantity }}</p>
                            @enderror
                        </td>
                        <td class="border-b border-gray-300 dark:border-gray-600 p-2">
                            <button type="button" class="remove-button focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Remove
                            </button>
                        </td>
                    </tr>`
                );

                // Populate the new select element with options
                var newSelect = $('#myTable tbody tr:last-child select');
                items.forEach(function(item) {
                    var option = $('<option></option>');
                    option.val(item.id).text(item.name);
                    newSelect.append(option);
                });
            });

            // Remove rows dynamically
            $(document).on('click', '.remove-button', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endsection
