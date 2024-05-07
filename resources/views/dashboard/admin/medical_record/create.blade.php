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
                        <a href="{{ route('medical_record.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                            Medical Record
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

    <form action="{{ route('medical_record.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <div class="mb-3">
                <label for="check_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Check Date
                </label>
                <input type="date" id="check_date" name="check_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
        </div>

        <div class="mb-3">
            <label for="owner_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Owner / Pemilik
            </label>
            <select id="owner_id" name="owner_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Select Registered Owner</option>
                @foreach ($owner as $item)
                    <option value="{{ $item->id }}" {{ old('owner_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            <div class="flex justify-end">
                <div class="text-black dark:text-white mr-2">
                    Owner belum terdaftar ?
                </div>
                <a href="{{ route('user.create') }}" class="text-blue-500">klik sini</a>
            </div>
        </div>

        <div class="mb-3">
            <label for="pet_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Pet
            </label>
            <select id="pet_id" name="pet_id" disabled
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected disabled>Select a pet</option>
                @foreach ($pet as $item)
                    <option value="{{ $item->id }}" data-owner-id="{{ $item->owner_id }}">
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
            <div class="flex justify-end">
                <div class="text-black dark:text-white mr-2">
                    Hewan belum terdaftar ?
                </div>
                <a href="{{ route('pet.create') }}" class="text-blue-500">klik sini</a>
            </div>
        </div>

        <div class="mb-3">
            <label for="complaints" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Complaints
            </label>
            <textarea id="complaints" rows="4" name="complaints"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ketik disini..."></textarea>
        </div>

        <div class="mb-3">
            <label for="doctor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Doctor Specialize
            </label>
            <select id="doctor_id" name="doctor_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected disabled>Select a Doctor Specialize</option>
                @foreach ($doctor as $item)
                    <option value="{{ $item->id }}" data-owner-id="{{ $item->owner_id }}">
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-end my-10">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create
            </button>
        </div>

    </form>
@endsection()

@section('script-js')
    <script>
        var currentStep = 1;

        function goToStep(step) {
            var forms = document.querySelectorAll('form');
            if (step < 1 || step > forms.length) return;

            forms.forEach(function(form) {
                form.classList.add('hidden');
            });

            document.getElementById('formStep' + step).classList.remove('hidden');
            currentStep = step;
        }

        var now = new Date();
        var year = now.getFullYear();
        var month = String(now.getMonth() + 1).padStart(2, '0');
        var day = String(now.getDate()).padStart(2, '0');
        var today = year + '-' + month + '-' + day;

        document.getElementById('check_date').value = today;
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ownerSelect = document.getElementById('owner_id');
            var petSelect = document.getElementById('pet_id');

            ownerSelect.addEventListener('change', function() {
                // Enable pet select
                petSelect.removeAttribute('disabled');

                // Filter pets based on selected owner
                var selectedOwnerId = ownerSelect.value;
                Array.from(petSelect.options).forEach(function(option) {
                    if (option.dataset.ownerId === selectedOwnerId || option.value === '') {
                        option.style.display = 'block';
                    } else {
                        option.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
