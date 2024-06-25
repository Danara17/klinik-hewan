@extends('dashboard.template.main')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse ($relatedPosts as $post)
    <div class="mx-auto bg-white rounded-lg shadow-md">
        <div class="p-4 flex flex-col gap-6">
            <div class="flex flex-col gap-1 static">
                <h1 class="text-xl font-semibold">{{ Str::limit($post->title, 25) }}</h1>
                <p class="text-sm text-gray-600">{{ Str::limit($post->body, 350) }}</p>
            </div>
            <div class="">
                <p class="text-xs text-justify">Author : {{ $post->author ? $post->author->name : 'Unknown Author' }}</p>
            </div>
            <x-simpleline-options class="w-7 " />
        </div>
    </div>
    @empty
    <div class=" dark:bg-gray-700 dark:text-white ">
        <p class="text-lg">Tidak ada artikel yang relevan.</p>
    </div>
    @endforelse
</div>

{{ $relatedPosts->links() }}
@endsection