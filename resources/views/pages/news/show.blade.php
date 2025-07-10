@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <!-- Detail Berita -->
    <div class="flex flex-col px-4 lg:px-14 mt-10">
        <div class="font-bold text-xl lg:text-2xl mb-6 text-center lg:text-left">
            <p>{{ $news->title }}</p>
        </div>
        <div class="flex flex-col lg:flex-row w-full gap-10">
            <!-- Berita Utama -->
            <div class="lg:w-8/12">
                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="MotoGP"
                    class="w-full max-h-96 rounded-xl object-cover">
                {!! $news->content !!}
            </div>
            <!-- Berita Terbaru -->
            <div class="lg:w-4/12 flex flex-col gap-10">
                <div class="sticky top-24 z-40">
                    <p class="font-bold mb-8 text-xl lg:text-2xl">Berita Terbaru Lainnya</p>
                    <!-- Berita Card -->
                    <div class=" gap-5 flex flex-col">
                        @foreach ($newsts as $new)
                            <a href="detail-MotoGp.html">
                                <div class="flex gap-3 border border-slate-300 hover:border-primary p-3 rounded-xl" style="height: 140px;">
                                    <div class="relative" style="min-width: 120px; width: 120px;">
                                        <div
                                            class="bg-primary text-white rounded-full w-fit px-3 py-1 font-normal text-xs absolute top-2 left-2 z-10">
                                            {{ $new->newsCategory->title }}
                                        </div>
                                        <img src="{{ asset('storage/' . $new->thumbnail) }}" alt=""
                                            class="rounded-xl object-cover" style="width: 120px; height: 100px;">
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between" style="padding: 4px 0;">
                                        <div>
                                            <p class="font-bold text-sm lg:text-base" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.3;">{{ $new->title }}</p>
                                            <p class="text-slate-400 mt-2 text-xs" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.3;">{{ \Str::limit(strip_tags($new->content), 80) }}</p>
                                        </div>
                                        <p class="text-slate-400 text-xs" style="margin-top: auto;">{{ $new->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Author Section -->
    <div class="flex flex-col gap-4 mb-10 p-4 lg:p-10 lg:px-14 w-full lg:w-2/3">
        <p class="font-semibold text-xl lg:text-2xl mb-2">Author</p>
        <a href="author.html">
            <div
                class="flex flex-col lg:flex-row gap-4 items-center border border-slate-300 rounded-xl p-6 lg:p-8 hover:border-primary transition">
                <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="profile" class="rounded-full w-24 lg:w-28 border-2 border-primary" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="text-center lg:text-left">
                    <p class="font-bold text-lg lg:text-xl">{{ $news->author->name }}</p>
                    <p class="text-sm lg:text-base leading-relaxed">
                    {{ \Str::limit($news->author->bio, 100) }}
                    </p>
                </div>
            </div>
        </a>
    </div>
@endsection