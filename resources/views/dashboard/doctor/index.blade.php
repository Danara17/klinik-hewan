@extends('dashboard.template.main')


@section('dashboard')
    <div class="p-4 sm:ml-64 bg-slate-50 dark:bg-gray-800 min-h-screen">
        {{-- Card Info --}}
        <div class="mt-16 md:mt-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm text-center">
                <div class="text-2xl text-gray-400 dark:text-white">1</div>
                <div class="text-xl font-semibold text-black dark:text-white">Job Queue</div>
            </div>
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm text-center">
                <div class="text-2xl text-gray-400 dark:text-white">1</div>
                <div class="text-xl font-semibold text-black dark:text-white">Job Queue</div>
            </div>
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm text-center">
                <div class="text-2xl text-gray-400 dark:text-white">1</div>
                <div class="text-xl font-semibold text-black dark:text-white">Job Queue</div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 mt-4">
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="font-semibold text-black dark:text-white mb-3">
                    Periksa Hewan
                </div>

                @foreach ($job as $item)
                    <a href="{{ route('medical_record.check', $item->id) }}"
                        class="p-3 flex border gap-4 shadow-sm hover:shadow-md">
                        <div class="h-36 w-36 overflow-hidden">
                            <img src="{{ asset('storage/client_pets_gallery/' . $item->pet->photo) }}"
                                alt="{{ $item->pet->name }}" class="h-full w-full object-cover">
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
                    <div class="flex justify-between items-center mt-3">
                        <div class="text-slate-500">
                            Created at {{ $item->getFormattedCreatedAtAttribute() }}
                        </div>
                        <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal"
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 16 3">
                                <path
                                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDotsHorizontal"
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
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Create Recipe
                                    </a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Set Action to this Pet
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection()
