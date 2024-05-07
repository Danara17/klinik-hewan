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
                            <div class="text-base  text-gray-600 dark:text-white">{{ $item->complaint }}</div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection()
