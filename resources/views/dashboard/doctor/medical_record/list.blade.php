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
                        <a href="{{ route('medical_record.list') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                            Medical Record
                        </a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">

    @foreach ($job as $item)
        <a href="{{ route('medical_record.check', $item->id) }}" class="p-3 flex border gap-4 shadow-sm hover:shadow-md">
            <div class="h-36 w-36 overflow-hidden">
                <img src="{{ asset('storage/client_pets_gallery/' . $item->pet->photo) }}" alt="{{ $item->pet->name }}"
                    class="h-full w-full object-cover">
            </div>
            <div>
                <div class="text-lg font-semibold text-black dark:text-white">
                    <span class="mr-2">
                        {{ $item->pet->name }}
                    </span>
                    <span
                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                        menunggu pemeriksaan anda
                    </span>
                </div>
                <div class="text-base  text-gray-600 dark:text-white">
                    <strong>Keluhan: </strong> {{ $item->complaint }}
                </div>
            </div>
        </a>
        <div class="flex justify-between items-center mt-3 mb-3">
            <div class="text-slate-500">
                Created at {{ $item->getFormattedCreatedAtAttribute() }}
            </div>
            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal-{{ $item->id }}"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                type="button">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 16 3">
                    <path
                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownDotsHorizontal-{{ $item->id }}"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownMenuIconHorizontalButton">
                    <li>
                        <a href="{{ route('pet.check', $item->pet->id) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Update Pet Information
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('prescription.create', $item->id) }}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Create Recipe
                        </a>
                    </li>
                </ul>
                <div class="py-2">
                    <a href="{{ route('medical_record.action', $item->id) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Set Action to this Pet
                    </a>
                </div>
            </div>
        </div>
    @endforeach
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
