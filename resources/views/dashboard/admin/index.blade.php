@extends('dashboard.template.main')

@section('script-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="{{ url('https://cdn.datatables.net/2.0.5/js/dataTables.js') }}"></script>
    <script>
        let prefers = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
        let html = document.querySelector('html');

        html.classList.add(prefers);
        html.setAttribute('data-bs-theme', prefers);
        $(document).ready(function() {
            $('#myTable').DataTable({
                lengthChange: false,
                searching: false
            });
        });
    </script>
@endsection


@section('dashboard')
    <div class="p-4 sm:ml-64 bg-slate-50 dark:bg-gray-800 min-h-screen">
        {{-- Card Info --}}
        <div class="mt-16 md:mt-14 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="">
                        <svg fill="#B0C5A4" width="30px" height="30px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="Outline">
                                    <g data-name="Outline" id="Outline-2">
                                        <path
                                            d="M22,41.192V33.885h4.027l5.7,7.893a1,1,0,0,0,1.621-1.171l-5.037-6.973a6.535,6.535,0,0,0-1.774-12.826H21a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0Zm9.077-13.846a4.544,4.544,0,0,1-4.539,4.539H22V22.808h4.538A4.544,4.544,0,0,1,31.077,27.346Z">
                                        </path>
                                        <path
                                            d="M37.615,26.346a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0V36.654h2.231a5.154,5.154,0,1,0,0-10.308ZM44,31.5a3.158,3.158,0,0,1-3.154,3.154H38.615V28.346h2.231A3.158,3.158,0,0,1,44,31.5Z">
                                        </path>
                                        <path
                                            d="M32,2A30,30,0,1,0,62,32,30.034,30.034,0,0,0,32,2Zm0,58A28,28,0,1,1,60,32,28.032,28.032,0,0,1,32,60Z">
                                        </path>
                                        <path
                                            d="M49.655,16.793a3.172,3.172,0,1,0-3.173,3.172,3.138,3.138,0,0,0,1.264-.266A19.994,19.994,0,0,1,22.691,49.707a1,1,0,1,0-.931,1.769A21.986,21.986,0,0,0,49.229,18.351,3.127,3.127,0,0,0,49.655,16.793Zm-4.344,0a1.172,1.172,0,1,1,1.171,1.172A1.172,1.172,0,0,1,45.311,16.793Z">
                                        </path>
                                        <path
                                            d="M16.793,44.035a3.157,3.157,0,0,0-.692.081A19.779,19.779,0,0,1,12,32,20.023,20.023,0,0,1,32,12a19.811,19.811,0,0,1,8.463,1.874,1,1,0,0,0,.848-1.812A21.989,21.989,0,0,0,14.39,45.16a3.141,3.141,0,0,0-.769,2.047,3.173,3.173,0,1,0,3.172-3.172Zm0,4.344a1.172,1.172,0,1,1,1.173-1.172A1.172,1.172,0,0,1,16.793,48.379Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">12%
                            naik</span>
                    </div>
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <div class="font-semibold text-xl text-black dark:text-white">Rp. 10.000.000</div>
                        <div class="text-sm text-gray-400">Pejualan</div>
                    </div>
                    <div>
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="">
                        <svg fill="#B0C5A4" width="30px" height="30px" viewBox="0 0 64 64"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="Outline">
                                    <g data-name="Outline" id="Outline-2">
                                        <path
                                            d="M22,41.192V33.885h4.027l5.7,7.893a1,1,0,0,0,1.621-1.171l-5.037-6.973a6.535,6.535,0,0,0-1.774-12.826H21a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0Zm9.077-13.846a4.544,4.544,0,0,1-4.539,4.539H22V22.808h4.538A4.544,4.544,0,0,1,31.077,27.346Z">
                                        </path>
                                        <path
                                            d="M37.615,26.346a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0V36.654h2.231a5.154,5.154,0,1,0,0-10.308ZM44,31.5a3.158,3.158,0,0,1-3.154,3.154H38.615V28.346h2.231A3.158,3.158,0,0,1,44,31.5Z">
                                        </path>
                                        <path
                                            d="M32,2A30,30,0,1,0,62,32,30.034,30.034,0,0,0,32,2Zm0,58A28,28,0,1,1,60,32,28.032,28.032,0,0,1,32,60Z">
                                        </path>
                                        <path
                                            d="M49.655,16.793a3.172,3.172,0,1,0-3.173,3.172,3.138,3.138,0,0,0,1.264-.266A19.994,19.994,0,0,1,22.691,49.707a1,1,0,1,0-.931,1.769A21.986,21.986,0,0,0,49.229,18.351,3.127,3.127,0,0,0,49.655,16.793Zm-4.344,0a1.172,1.172,0,1,1,1.171,1.172A1.172,1.172,0,0,1,45.311,16.793Z">
                                        </path>
                                        <path
                                            d="M16.793,44.035a3.157,3.157,0,0,0-.692.081A19.779,19.779,0,0,1,12,32,20.023,20.023,0,0,1,32,12a19.811,19.811,0,0,1,8.463,1.874,1,1,0,0,0,.848-1.812A21.989,21.989,0,0,0,14.39,45.16a3.141,3.141,0,0,0-.769,2.047,3.173,3.173,0,1,0,3.172-3.172Zm0,4.344a1.172,1.172,0,1,1,1.173-1.172A1.172,1.172,0,0,1,16.793,48.379Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">12%
                            naik</span>
                    </div>
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <div class="font-semibold text-xl text-black dark:text-white">Rp. 10.000.000</div>
                        <div class="text-sm text-gray-400">Pejualan</div>
                    </div>
                    <div>
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="flex items-center justify-between">
                    <div class="">
                        <svg fill="#B0C5A4" width="30px" height="30px" viewBox="0 0 64 64"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g id="Outline">
                                    <g data-name="Outline" id="Outline-2">
                                        <path
                                            d="M22,41.192V33.885h4.027l5.7,7.893a1,1,0,0,0,1.621-1.171l-5.037-6.973a6.535,6.535,0,0,0-1.774-12.826H21a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0Zm9.077-13.846a4.544,4.544,0,0,1-4.539,4.539H22V22.808h4.538A4.544,4.544,0,0,1,31.077,27.346Z">
                                        </path>
                                        <path
                                            d="M37.615,26.346a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0V36.654h2.231a5.154,5.154,0,1,0,0-10.308ZM44,31.5a3.158,3.158,0,0,1-3.154,3.154H38.615V28.346h2.231A3.158,3.158,0,0,1,44,31.5Z">
                                        </path>
                                        <path
                                            d="M32,2A30,30,0,1,0,62,32,30.034,30.034,0,0,0,32,2Zm0,58A28,28,0,1,1,60,32,28.032,28.032,0,0,1,32,60Z">
                                        </path>
                                        <path
                                            d="M49.655,16.793a3.172,3.172,0,1,0-3.173,3.172,3.138,3.138,0,0,0,1.264-.266A19.994,19.994,0,0,1,22.691,49.707a1,1,0,1,0-.931,1.769A21.986,21.986,0,0,0,49.229,18.351,3.127,3.127,0,0,0,49.655,16.793Zm-4.344,0a1.172,1.172,0,1,1,1.171,1.172A1.172,1.172,0,0,1,45.311,16.793Z">
                                        </path>
                                        <path
                                            d="M16.793,44.035a3.157,3.157,0,0,0-.692.081A19.779,19.779,0,0,1,12,32,20.023,20.023,0,0,1,32,12a19.811,19.811,0,0,1,8.463,1.874,1,1,0,0,0,.848-1.812A21.989,21.989,0,0,0,14.39,45.16a3.141,3.141,0,0,0-.769,2.047,3.173,3.173,0,1,0,3.172-3.172Zm0,4.344a1.172,1.172,0,1,1,1.173-1.172A1.172,1.172,0,0,1,16.793,48.379Z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">12%
                            naik</span>
                    </div>
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <div class="font-semibold text-xl text-black dark:text-white">Rp. 10.000.000</div>
                        <div class="text-sm text-gray-400">Pejualan</div>
                    </div>
                    <div>
                        <button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Lihat Detail
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grafikal --}}
        <div class="grid grid-cols-1 lg:grid-cols-2  gap-4 mt-4">
            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="font-semibold text-black dark:text-white mb-3">
                    Grafik Pasien
                </div>
                <div class="flex items-center justify-center">
                    <canvas id="myChart"></canvas>
                </div>
            </div>


            <div class="p-4 rounded-lg  bg-white dark:bg-gray-700 shadow-sm">
                <div class="flex justify-between items-center">
                    <div class="font-semibold text-black dark:text-white mb-3">
                        Grafik Pasien
                    </div>
                    <a href="{{ route('dashboard.quick_start', 1) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Quick Start
                    </a>
                </div>

                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="overflow-x-auto dark:text-white">
                    <table id="myTable" class="table-auto min-w-full dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Email</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection()
