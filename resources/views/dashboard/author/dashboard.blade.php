@extends('dashboard.template.main')

@section('script-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch("{{ route('categories.data') }}")
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('myChart').getContext('2d');

                    // Prepare data for the chart
                    const labels = Object.keys(data);
                    const chartData = Object.values(data);

                    // Generate random colors for each category
                    const backgroundColors = labels.map(() => {
                        const r = Math.floor(Math.random() * 255);
                        const g = Math.floor(Math.random() * 255);
                        const b = Math.floor(Math.random() * 255);
                        return `rgba(${r}, ${g}, ${b}, 0.6)`;
                    });

                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Distribusi Kategori',
                                data: chartData,
                                backgroundColor: backgroundColors,
                                borderColor: 'rgba(255, 255, 255, 1)',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'bottom',
                                    labels: {
                                        color: 'gray'
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const label = context.label || '';
                                            const value = context.raw || 0;
                                            return `${label}: ${value}`;
                                        }
                                    }
                                }
                            },
                            animation: {
                                animateScale: true,
                                animateRotate: true
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching category data:', error));
        });
    </script>
    <script src="{{ url('https://cdn.datatables.net/2.0.5/js/dataTables.js') }}"></script>
    <script>
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
        <h1 class="text-2xl font-semibold text-black dark:text-white mt-12">Dashboard</h1>
        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
    <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow-md">
        <div class="flex items-center">
            <div class="p-3 bg-blue-500 text-white rounded-full">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z" clip-rule="evenodd"/>
</svg>

            </div>
            <div class="ml-4">
               <div class="text-xl font-bold text-gray-900 dark:text-white">
               </div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Category Amount</div>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow-md">
        <div class="flex items-center">
            <div class="p-3 bg-green-500 text-white rounded-full">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
</svg>

                
            </div>
            <div class="ml-4">
                <div class="text-xl font-bold text-gray-900 dark:text-white"></div>
                <div class="text-sm text-gray-600 dark:text-gray-400">Author Amount</div>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white dark:bg-gray-700 rounded-lg shadow-md">
        <div class="flex items-center">
            <div class="p-3 bg-red-500 text-white rounded-full">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4.5V19a1 1 0 0 0 1 1h15M7 14l4-4 4 4 5-5m0 0h-3.207M20 9v3.207"/>
</svg>

            </div>
            <div class="ml-4">
                <div class="text-xl font-bold text-gray-900 dark:text-white"></div>
                <div class="text-sm text-gray-600 dark:text-gray-400">
                Most Category</div>
            </div>
        </div>
    </div>
</div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mt-8">
            <div class="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm mb-4">
                <div class="font-semibold text-black dark:text-white mb-3">
                    Grafik Category
                </div>
                <div class="flex items-center justify-center" style="height: 500px;">
                    <canvas id="myChart" width="500" height="500"></canvas>
                </div>
            </div>

            <div class="p-4 rounded-lg bg-white dark:bg-gray-700 shadow-sm mb-4">
                <div class="flex justify-between items-center">
                    <div class="font-semibold text-black dark:text-white mb-3">
                        Table Dashboard
                    </div>
                </div>

                <div class="overflow-x-auto dark:text-white">
                    <table id="myTable" class="table-auto min-w-full dark:bg-gray-800">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-900">
                                <th class="px-4 py-2 text-left border border-gray-300 dark:border-gray-700">Author</th>
                                <th class="px-4 py-2 text-left border border-gray-300 dark:border-gray-700">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                @foreach ($post->categories as $category)
                                    <tr>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">{{ $post->author ? $post->author->name : 'Unknown Author' }}</td>
                                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-700">{{ $category->name }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection