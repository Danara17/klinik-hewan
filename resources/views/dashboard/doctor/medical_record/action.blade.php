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
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('medical_record.action', $data->id) }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Action</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">

    <form action="{{ route('medical_record.set_status') }}" method="POST">
        @csrf

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tbody>
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Check Date
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->check_date }}
                    </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Owner
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->pet->owner->name }}
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Pet
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->pet->name }}
                    </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Complaints
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->complaint }}
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Doctor
                    </th>
                    <td class="px-6 py-4">
                        {{ $data->doctor->name }}
                    </td>
                </tr>
                <tr class="bg-gray-50 dark:bg-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Diagnosis
                    </th>
                    <td class="px-6 py-4">
                        @if ($data->diagnosis == null || $data->diagnosis == '')
                            <span
                                class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                                Belum mengisi diagnosa
                            </span>
                        @else
                            {{ $data->diagnosis }}
                        @endif
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Status
                    </th>
                    <td class="px-6 py-4">
                        <select id="status" name="status_perawatan" required
                            class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>Select status</option>
                            <option value="diperiksa" @if ($data->status_perawatan == 'diperiksa') selected @endif>
                                Sedang Di Periksa
                            </option>
                            <option value="sudah_diperiksa" @if ($data->status_perawatan == 'sudah_diperiksa') selected @endif>
                                Sudah Di Periksa
                            </option>
                            <option value="dirawat" @if ($data->status_perawatan == 'dirawat') selected @endif>
                                Sedang Di Rawat
                            </option>
                            <option value="selesai" @if ($data->status_perawatan == 'selesai') selected @endif>
                                Selesai
                            </option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- <div class="mb-3">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Status <span class="text-red-500">*</span>
            </label>
            <select id="status" name="status" required
                class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" disabled selected>Select status</option>
                <option value="Pending" @if ($data->status == 'Pending') selected @endif>Pending</option>
                <option value="Completed" @if ($data->status == 'Completed') selected @endif>Completed</option>
                <option value="Cancelled" @if ($data->status == 'Cancelled') selected @endif>Cancelled</option>
            </select>
        </div> --}}

        <input type="text" value="{{ $data->id }}" name="id" hidden>

        <div class="flex justify-end my-10">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Simpan
            </button>
        </div>

    </form>
@endsection()

@section('script-js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var now = new Date();
            var year = now.getFullYear();
            var month = String(now.getMonth() + 1).padStart(2, '0');
            var day = String(now.getDate()).padStart(2, '0');
            var today = year + '-' + month + '-' + day;

            document.getElementById('check_date').value = today;
        });
    </script>
@endsection
