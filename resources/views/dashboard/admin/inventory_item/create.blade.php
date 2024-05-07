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
                        <a href="{{ route('inventory_item.index') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Master
                            Inventory Item</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('inventory_item.create') }}"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Create</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <hr class="h-px my-4 bg-gray-200 border-0 dark:bg-gray-500">

    <form action="{{ route('inventory_item.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Name
            </label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Category
            </label>
            <select id="category" name="category"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Pilih Category Item</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between mb-3 space-x-3">
            <div class="w-1/2">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Harga Satuan (Rp)</label>
                <input type="text" id="harga" name="harga" value="{{ old('harga') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('harga')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex w-1/2 space-x-3">
                <div class="w-1/2">
                    <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                    <input type="text" id="stok" name="stok" value="{{ old('stok') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('stok')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Satuan</label>
                    <select id="satuan" name="satuan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Satuan Jasa" {{ old('satuan') == 'Satuan Jasa' ? 'selected' : '' }}>Satuan
                            Jasa</option>
                        <option value="Kapsul" {{ old('satuan') == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                        <option value="Botol Sirup" {{ old('satuan') == 'Botol Sirup' ? 'selected' : '' }}>Botol
                            Sirup</option>
                        <option value="Botol Suspensi" {{ old('satuan') == 'Botol Suspensi' ? 'selected' : '' }}>Botol
                            Suspensi</option>
                        <option value="Botol Emulsi" {{ old('satuan') == 'Botol Emulsi' ? 'selected' : '' }}>Botol
                            Emulsi</option>
                        <option value="Botol Eliksir" {{ old('satuan') == 'Botol Eliksir' ? 'selected' : '' }}>Botol
                            Eliksir</option>
                        <option value="Botol Insulin" {{ old('satuan') == 'Botol Insulin' ? 'selected' : '' }}>Botol
                            Insulin</option>
                        <option value="Injeksi" {{ old('satuan') == 'Injeksi' ? 'selected' : '' }}>Injeksi</option>
                        <option value="Tablet" {{ old('satuan') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                        <option value="Kaplet" {{ old('satuan') == 'Kaplet' ? 'selected' : '' }}>Kaplet</option>
                    </select>
                    @error('satuan')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
            <textarea id="desc" name="desc" rows="6"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Berikan deskripsi item disini ...">{{ old('desc') }}</textarea>
            @error('desc')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Photo Product
            </label>
            <input
                class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="photo" type="file" name="photo">
            @error('photo')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end my-10">
            <button type="submit"
                class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create
            </button>
        </div>

    </form>
@endsection
