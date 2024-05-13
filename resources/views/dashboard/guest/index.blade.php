@extends('dashboard.template.main')


@section('dashboard')
    <div class="p-4 sm:ml-64 bg-slate-50 dark:bg-gray-800 min-h-screen">
        {{-- Card Info --}}


        <div class="grid grid-cols-1 gap-4 mt-14">
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="font-semibold text-black dark:text-white mb-3">
                    My Invoice
                </div>

            </div>
        </div>
    </div>
@endsection()
