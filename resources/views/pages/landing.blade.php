@extends('layouts.app')
@section('title', 'BNB News - Berita Terkini')
@section('content')
    <!-- swiper -->
    <div class="swiper mySwiper mt-9">
        <div class="swiper-wrapper">
            @foreach ($baners as $baner)
                <div class="swiper-slide">
                    <a href="{{ route('news.show', $baner->news->slug) }}" class="block">
                        <div class="relative flex flex-col gap-1 justify-end p-3 h-72 rounded-xl bg-cover bg-center overflow-hidden"
                            style="background-image: url('{{ asset('storage/' . $baner->news->thumbnail) }}');">
                            <div
                                class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-[rgba(0,0,0,0.4)] to-[rgba(0,0,0,0)] rounded-b-xl">
                            </div>
                            <div class="relative z-10 mb-3" style="padding-left: 10px;">
                                <div class="bg-primary text-white text-xs rounded-lg w-fit px-3 py-1 font-normal mt-3">
                                    {{ $baner->news->newsCategory->title }}</div>
                                <p class="text-3xl font-semibold text-white mt-1">{{ $baner->news->title }}</p>
                                <div class="flex items-center gap-1 mt-1">
                                    <img src="{{ asset('storage/' . $baner->news->author->avatar) }}" alt=""
                                        class="w-8 h-8 object-cover" style="border-radius: 50%; aspect-ratio: 1/1; ">
                                    <p class="text-white text-xs">{{ $baner->news->author->name }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Berita Unggulan -->
    <div class="flex flex-col px-14 mt-10 ">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
            <div class="font-bold text-2xl text-center md:text-left">
                <p>Berita Unggulan</p>
                <p>Untuk Kamu</p>
            </div>
            <a href="semuaberita.html"
                class="bg-primary px-5 py-2 rounded-full text-white font-semibold mt-4 md:mt-0 h-fit">
                Lihat Semua
            </a>
        </div>
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
            @foreach ($featureds as $featured)
                <a href="{{ route('news.show', $featured->slug) }}">
                    <div class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out"
                        style="height: 100%">
                        <div
                            class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                            {{ $featured->newsCategory->title }}</div>
                        <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt=""
                            class="w-full rounded-xl mb-3" style="height: 150px; object-fit: cover;    ">
                        <p class="font-bold text-base mb-1">{{ $featured->title }}</p>
                        <p class="text-slate-400">{{ $featured->created_at->format('d F Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Berita Terbaru -->
    <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
        <div class="flex flex-col md:flex-row w-full mb-6">
            <div class="font-bold text-2xl text-center md:text-left">
                <p>Berita Terbaru</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
            <!-- Berita Utama -->
            <div
                class="relative col-span-7 border border-slate-200 rounded-xl overflow-hidden hover:border-primary hover:cursor-pointer group">
                <a href="{{ route('news.show', $news[0]->slug) }}" class="block">
                    <!-- Badge Category -->
                    <div
                        class="absolute top-4 left-4 bg-primary text-white rounded-full px-4 py-1 font-normal text-sm z-10">
                        {{ $news[0]->newsCategory->title }}
                    </div>

                    <!-- Image Container -->
                    <div class="relative w-full h-64 md:h-80">
                        <img src="{{ asset('storage/' . $news[0]->thumbnail) }}" alt="berita utama"
                            class="w-full h-full object-cover">
                    </div>

                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2 group-hover:text-primary transition-colors">
                            {{ $news[0]->title }}
                        </h3>
                        <p class="text-slate-600 text-base mb-2">
                            {{ \Str::limit(strip_tags($news[0]->content), 100) }}
                        </p>
                        <p class="text-slate-400 text-sm">
                            {{ $news[0]->created_at->format('d F Y') }}
                        </p>
                    </div>
                </a>
            </div>

            <!-- Berita Sampingan -->
            <div class="col-span-5 space-y-4">
                @foreach ($news->skip(1) as $new)
                    <a href="{{ route('news.show', $new->slug) }}"
                        class="relative col-span-5 flex flex-col h-fit md:flex-row gap-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
                        <div
                            class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-2 mt-2 absolute text-sm">
                            {{ $new->newsCategory->title }}
                        </div>
                        <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="berita2" class="rounded-xl md:max-h-48"
                            style="width: 250px; object-fit: cover;">
                        <div class="mt-2 md:mt-0">
                            <p class="font-semibold text-lg">{{ $new->title }}</p>
                            <p class="text-slate-400 mt-3 text-sm font-normal">
                                {{ \Str::limit(strip_tags($new->content), 100) }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Author -->
    <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
            <div class="font-bold text-2xl text-center md:text-left">
                <p>Kenali Author</p>
                <p>Terbaik Dari Kami</p>
            </div>
        </div>
        <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach ($authors as $author)
                <a href="{{ route('author.show', $author->username) }}">
                    <div
                        class="flex flex-col items-center border border-slate-200 px-4 py-8 rounded-2xl hover:border-primary hover:cursor-pointer">
                        <img src="{{ asset('storage/' . $author->avatar) }}" alt="" class="rounded-full w-24 h-24" style="width: 100px; height: 100px; object-fit: cover;">
                        <p class="font-bold text-xl mt-4">{{ $author->name }}</p>
                        <p class="text-slate-400">{{ $author->news->count() }} Berita</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Pilihan Author -->
    <div class="flex flex-col px-14 mt-10 mb-10">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
            <div class="font-bold text-2xl text-center md:text-left">
                <p>Pilihan Author</p>
            </div>
        </div>
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
            @foreach ($news as $item)
                <a href="{{ route('news.show', $item->slug) }}">
                    <div
                        class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out" style="height: 100%">
                        <div
                            class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                            {{ $item->newsCategory->title }}</div>
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt=""
                            class="w-full rounded-xl mb-3" style="height: 200px; object-fit: cover;">
                        <p class="font-bold text-base mb-1">{{ $item->title }}</p>
                        <p class="text-slate-400">{{ $item->created_at->format('d F Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Swiper JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.mySwiper', {
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                loop: true,
                slidesPerView: 3,
                spaceBetween: 20,
            });
        });
    </script>
@endsection