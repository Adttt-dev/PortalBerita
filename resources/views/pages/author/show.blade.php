@extends('layouts.app')

@section('title', $author->name)

@section('content')
    <!-- Author -->
    <div class="flex gap-4 items-center mb-10 text-white p-10 bg-cover" style="background-image: url('{{ asset('assets/img/bg-profile.png') }}');">
        <img src="{{ asset('storage/' . $author->avatar) }}" alt="profile" class="rounded-full max-w-28 " style="width: 100px; height: 100px; object-fit: cover;">
        <div class="">
            <p class="font-bold text-lg">{{ $author->name }}</p>
            <p>{{ $author->bio }}</p> 
        </div>
    </div>

    <!-- Berita -->
    <div class=" flex flex-col gap-5 px-4 lg:px-14">
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
            @foreach ($author->news as $news)
            <a href="{{ route('news.show', $news->slug) }}">
                <div
                    class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out"
                    style="height: 320px; display: flex; flex-direction: column;">
                    <div class="relative" style="margin-bottom: 12px;">
                        <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal text-sm absolute top-2 left-2 z-10">
                            {{ $news->newsCategory->title }}
                        </div>
                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}" 
                             class="w-full rounded-xl object-cover" style="height: 160px;">
                    </div>
                    <div style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                        <p class="font-bold text-base mb-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $news->title }}</p>
                        <p class="text-slate-400 text-sm" style="margin-top: auto;">{{ $news->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection