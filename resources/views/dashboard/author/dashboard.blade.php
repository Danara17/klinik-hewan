@extends('dashboard.template.main')

@section('dashboard')
<div class="p-4 sm:ml-64 bg-gray-900 dark min-h-screen">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4 mt-14">
        @foreach ($posts as $post)
        <div class="p-4 rounded-lg bg-white dark:bg-gray-800 shadow-sm mb-4">
            <div class="font-semibold text-black dark:text-white mb-3">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="text-sm text-white mb-3">
                <p>Author : {{ $post->author ? $post->author->name : 'Unknown Author' }}</p>
            </div>
            <div class="text-white mb-3">
                <p>Description : {{ \Illuminate\Support\Str::words($post->body, 50, '...') }}</p>
            </div>
            <div class="mt-2">
                @foreach ($post->categories as $category)
                <span class="inline-block bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center cursor-pointer">
                    {{ $category->name }}
                </span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
