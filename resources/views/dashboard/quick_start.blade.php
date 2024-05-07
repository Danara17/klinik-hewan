@extends('dashboard.template.main')

@section('content')
    <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
        <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
            <span
                class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                1
            </span>
            <span>
                <h3 class="font-medium leading-tight">Informasi Hewan</h3>
            </span>
        </li>
        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
            <span
                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                2
            </span>
            <span>
                <h3 class="font-medium leading-tight">Cek Fisik</h3>
            </span>
        </li>
        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
            <span
                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                3
            </span>
            <span>
                <h3 class="font-medium leading-tight">Hasil Lab</h3>
            </span>
        </li>
        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
            <span
                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                4
            </span>
            <span>
                <h3 class="font-medium leading-tight">Pengobatan</h3>
            </span>
        </li>
        <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
            <span
                class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                5
            </span>
            <span>
                <h3 class="font-medium leading-tight">Pembayaran</h3>
            </span>
        </li>
    </ol>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <form action="" method="post" class="">
        <div>
            <!-- Isi langkah 1 -->
            <div class="mb-3">
                <div class="mb-3">
                    <label for="check_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Tanggal Jenguk
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
        </div>

        <div>
            <div class="mb-3">
                <label for="pet_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Hewan
                </label>
                <select id="pet_id" name="pet_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach ($pet as $item)
                        <option value="{{ $item->id }}" {{ old('pet_id') == $item->id ? 'selected' : '' }}>
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
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Keluhan
                </label>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Ketik disini..."></textarea>
            </div>
        </div>


        <div class="flex justify-end">
            <!-- Tombol Back -->
            <button type="button" onclick="goToStep(currentStep - 1)"
                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                Back
            </button>

            <!-- Tombol Next -->
            <button type="button" onclick="goToStep(currentStep + 1)"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Next
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
@endsection
