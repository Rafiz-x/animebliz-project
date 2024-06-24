@php
    $namespace = 'post';
@endphp

@extends('home.master')

@section('title', "$post->title | $APP_NAME")

@section('header')

@section('main')
    <section
        class="post h-fit mx-auto w-fit sm:w-[90vw] md:w-[80vw] lg:w-[70vw] sm:mt-4 pb-10 flex flex-col gap-5 bg-zinc-900">

        @php
            $backdropImg = json_decode($post->backdrops);

            if ($backdropImg->type == 'url') {
                $backdropLG = $backdropImg->img->large;
                $backdropSM = $backdropImg->img->small ?? null;
            } elseif ($backdropImg->type == 'custom') {
                $backdropLG = '/uploads/backdrops/' . $backdropImg->img->large;
                $backdropSM = '/uploads/backdrops/' . ($backdropImg->img->small ?? '');
            }
        @endphp

        <div class="backdrop relative aspect-video w-full sm:rounded-md overflow-hidden">
            <div class="overlay z-10 absoluteCenter w-[101%] h-[101%]"
                style='background:linear-gradient(0deg, rgb(24, 24, 24) 1%, transparent 99%);'>

            </div>
            <picture class="w-full h-full">
                @isset($backdropSM)
                    <source media="(max-width:1280px)" srcset="{{ $backdropSM }}">
                @endisset
                <img class="w-full h-full" src="{{ $backdropLG }}">
            </picture>
            <div
                class="info absolute bottom-0 left-0 px-[5%] py-1 text-white textShadow flex flex-col z-20
                xs:gap-1 sm:gap-1.5 md:gap-2 lg:gap-3 xl:gap-4">
                <span class="title font-extrabold text-xl md:text-2xl lg:text-3xl">{{ $post->title }}</span>
                <span
                    class="type text-neutral-300 font-semibold text-lg  md:text-xl lg:text-2xl">{{ $post->type == 'tv' ? 'TV' : 'MOVIE' }}</span>
            </div>
        </div>

        <div class="flex flex-col gap-2 px-[5%]">
            <div class="flex gap-2 xl:text-lg">
                <span class="match text-[#54ff96] font-semibold">{{ $post->rating * 10 }}% Match</span>
                @php
                    $postDate = new DateTime($post->release_date);
                    $postYear = $postDate->format('Y');
                @endphp

                <span class="year text-white">{{ $postYear }}</span>
            </div>

            <div class="postSynopsis">
                <p class="text-neutral-300 line-clamp-3 lg:text-lg xl:text-xl">{{ $post->synopsis }}</p>
                <button class="showMoreLess text-zinc-500 hover:text-zinc-600 cursor-pointer font-semibold">Show
                    More</button>
            </div>
        </div>

        <hr class="border-zinc-600 mx-auto w-[90%]">

        <div class="actions mt-5 px-[5%] flex gap-5 items-center">
            <button data-action="links"
                class="active text-white hover:text-neutral-300 lg:text-lg xl:text-xl">Links</button>
            <button data-action="about" class="text-white hover:text-neutral-300 lg:text-lg xl:text-xl">About</button>
        </div>

        <div class="action_results px-[5%]">
            <div class="" data-action="links">
                @if ($links->isEmpty())
                    <span class="text-zinc-400 text-lg lg:text-xl">No Links found!</span>
                @else
                    <div class="links mx-auto w-fit mt-5">
                        @foreach ($links as $link)
                            <div class="link text-white inline-flex flex-col gap-1.5 mb-10 sm:mx-4 md:mx-6 lg:mx-8">
                                <div class="flex">
                                    <h3 class="text-neutral-500">No. </h3>
                                    <span class="text-amber-500">{{ $loop->iteration }}</span>
                                </div>
                                <div class="name flex">
                                    <h3 class="text-neutral-500">Name: </h3>
                                    <span>{{ $link->name }}</span>
                                </div>
                                <div class="type flex">
                                    <h3 class="text-neutral-500">Type: </h3>
                                    <span>{{ $link->type }}</span>
                                </div>
                                <div class="quality flex">
                                    <h3 class="text-neutral-500">Quality: </h3>
                                    <span>{{ $link->quality }}</span>
                                </div>
                                <div class="language flex">
                                    <h3 class="text-neutral-500">Language: </h3>
                                    <span>{{ $link->language }}</span>
                                </div>
                                <a href="{{ $link->url }}" target="_blank" class="download flex justify-center items-center mt-2 mx-auto w-full text-white bg-violet-600 hover:bg-violet-700 active:bg-violet-800 sm:active:scale-95 focus:ring-1 focus:ring-gray-400 rounded-md px-3 py-1.5 sm:px-4 sm:py-2 cursor-pointer" tabindex="-1">
                                    Download
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="hidden" data-action="about">
                <div class="flex flex-col gap-2">

                    <div class="released">
                        <span class="text-zinc-400">Released on: </span>
                        @php
                            $postDate = new DateTime($post->release_date);
                            $formattedDate = $postDate->format('j F Y');
                        @endphp
                        <span class="text-white">{{ $formattedDate }}</span>
                    </div>
                    <div class="location">
                        <span class="text-zinc-400">Location: </span>
                        <span class="text-white">{{ $post->location }}</span>
                    </div>
                    <div class="genres flex gap-2">
                        <span class="text-zinc-400">Genres: </span>
                        <ul class="flex flex-wrap text-white gap-x-1">
                            @foreach ($genres as $genre)
                                <li>
                                    <a class="hover:underline" href="{{ route('genre', $genre->slug) }}">
                                        {{ $genre->name }}
                                        {{ !$loop->last ? ',' : '' }}
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
