@extends('home.master')

@section('title', "$genre->name | $APP_NAME")

@section('header')

@section('main')
    <section class="h-fit mx-auto w-full px-[3vw] pt-10 flex flex-col gap-5">
        <div class="name flex mx-auto items-center justify-center gap-1.5 px-[3vw]">
            <div class="ball w-3 sm:w-3.5 md:w-4 lg:w-5 aspect-square rounded-full bg-[#ff5f5f]"></div>
            <h1 class="text-lg w-fit sm:text-xl md:text-2xl xl:text-2xl font-semibold text-white relative">
                {{ $genre->name }}</h1>
        </div>


        <div
            class="results grid sm:px-2 gap-2 md:gap-3 xl:gap-3 grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7">
            {{-- w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] --}}
            @if ($posts->isEmpty())
                <h1 class="text-white flex items-center justify-center col-span-12 text-xl lg:text-2xl xl:text-2xl h-[10vh]">No Post Found</h1>
            @else
                @foreach ($posts as $post)
                    <div
                        class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3]  md:hover:scale-[1.1] rounded-[4px]">
                        <a href="{{ route('post', $post->slug) }}" class="content w-full h-full group">
                            <picture>
                                @php
                                    $posterImg = json_decode($post->posters);
                            
                                    if ($posterImg->type == 'url') {
                                        $posterDefault = $posterImg->img->default;
                                        $posterLG = $posterImg->img->large ?? null;
                                        $posterSM = $posterImg->img->small ?? null;
                                    } elseif ($posterImg->type == 'custom') {
                                        $poster = '/uploads/posters/' . $posterImg->img->default;
                                        $posterLG = '/uploads/posters/' . ($posterImg->img->large ?? '');
                                        $posterSM = '/uploads/posters/' . ($posterImg->img->small ?? '');
                                    }
                                @endphp
                            
                                @isset($posterSM)
                                    <source media="(max-width: 600px)" srcset="{{ $posterSM }}">
                                @endisset
                            
                                @isset($posterLG)
                                    <source media="(min-width: 2500px)" srcset="{{ $posterLG }}">
                                @endisset
                            
                                <img alt="Poster" srcset="{{ $posterDefault }}" class="w-full h-full">
                            </picture>
                            
                            <div
                                class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                            </div>
                            <div
                                class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                <span class="title">{{ $post->title }}</span>
                                {{-- <span class="season font-semibold text-[#fd8817]">Season 1</span> --}}
                            </div>
                        </a>

                    </div>
                @endforeach

            @endif


        </div>

    </section>

@endsection
