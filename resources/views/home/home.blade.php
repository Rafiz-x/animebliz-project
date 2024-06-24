@php
    $namespace = 'home';
@endphp

@extends('home.master')

@section('title', $APP_NAME)


@section('main')
    <div id="hero"
        class="relative w-full min-h-fit flex items-center bg-cover py-20 sm:py-28 md:py-32 lg:py-40 overflow-hidden before:bg-[rgba(20,20,20,0.2)]">
         {{-- before:absolute before:top-0 before:left-0 before:h-full before:content-[''] before:-z-[9] before:bg-opacity-40 before:rounded-r-full before:backdrop-blur-sm before:w-0 sm:before:w-[70vw] md:before:w-[60vw] lg:before:w-[50vw]"> --}}
        {{-- style="background:  linear-gradient(90deg, rgb(20, 20, 20, 0.1) 40%, transparent 100%) 0% 0% / cover, 
        linear-gradient(90deg, rgb(0, 0, 0) 2%, transparent 50%);
        "> --}}

        {{-- <div class="bg-img absolute top-0 left-0 w-full h-full object-cover aspect-video -z-10"> --}}

        @php
            $backdropImg = json_decode($headerPost->backdrops);

            if ($backdropImg->type == 'url') {
                $backdropLG = $backdropImg->img->large;
                $backdropSM = $backdropImg->img->small ?? null;
            } elseif ($backdropImg->type == 'custom') {
                $backdropLG = '/uploads/backdrops/' . $backdropImg->img->large;
                $backdropSM = '/uploads/backdrops/' . ($backdropImg->img->small ?? '');
            }
        @endphp
        <picture class="w-full h-full absolute top-0 left-0 object-cover -z-10 opacity-70">
            @isset($backdropSM)
                <source media="(max-width:1280px)" srcset="{{ $backdropSM }}">
            @endisset
            <img class="w-full h-full absolute top-0 left-0 object-cover -z-10" src="{{ $backdropLG }}">
        </picture>
        {{-- </div> --}}




        <div class="absolute top-0 left-0 w-full h-full bg-[rgba(0,0,0,0.6)] opacity-20"
            style="box-shadow: 0px 0px 50px 40px rgba(0,0,0,0.1);"></div>

        <div class="w-full mx-auto">
            <div
                class="w-full flex flex-col gap-2 font-semibold text-white px-[3.5vw] text-[16px] md:text-lg md:gap-4 lg:text-xl lg:gap-5">
                <div class="logo max-w-[90vw] sm:max-w-[60vw] md:max-w-[50vw] lg:max-w-[40vw] line-clamp-2">
                    <h1 class="text-white text-[22px] sm:text-2xl md:text-3xl textShadow">{{ $headerPost->title }}</h1>
                    {{-- <img src="{{ asset('img/narutoLogo.png') }}" alt="LOGO" class="drop-shadow-lg"> --}}
                </div>

                <div class="flex gap-3 textShadow">
                    <span class="match text-[#54ff96]">{{ $headerPost->rating * 10 }}% Match</span>

                    @php
                        $headerPostDate = new DateTime($headerPost->release_date);
                        $headerPostYear = $headerPostDate->format('Y');
                    @endphp

                    <span class="year">{{ $headerPostYear }}</span>
                    {{-- <span>706 Episodes</span> --}}
                </div>

                <p
                    class="overflow-hidden overflow-ellipsis line-clamp-3 max-w-[90vw] textShadow xs:max-w-[80vw] sm:max-w-[60vw] md:max-w-[50vw] lg:max-w-[40vw] text-sm lg:text-base xl:text-lg bg-opacity-50 backdrop-blur-sm rounded-lg">
                    {{ $headerPost->synopsis }}
                </p>

                <div class="btns mt-4 flex gap-2 text-sm font-normal md:text-[16px] lg:text-lg">
                    <a href="{{ route('post', $headerPost->slug) }}"
                        class="flex justify-center items-center gap-1 px-4 py-2 md:px-6 md:py-2.5 lg:px-8 lg:py-3 bg-rose-500 hover:bg-rose-600 rounded-md drop-shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#ddd" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="svgIcon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                        </svg>
                        <span>Watch Now</span>
                    </a>

                    <a href="{{ route('post', $headerPost->slug) }}"
                        class="flex justify-center items-center gap-1 px-4 py-2 md:px-6 md:py-2.5 lg:px-8 lg:py-3 bg-indigo-500 hover:bg-indigo-600 rounded-md drop-shadow-md">
                        <svg class="svgIcon text-[#ddd]" viewBox="0 0 24 24" fill="none" stroke="#ddd" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="16" x2="12" y2="12" />
                            <line x1="12" y1="8" x2="12.01" y2="8" />
                        </svg>
                        <span>More Information</span>
                    </a>

                </div>
            </div>
        </div>

    </div>

    <div class="content mt-10 py-3">
        @foreach ($sections as $section)
            <section class="py-2">

                <a href="{{ route('genre', $section->slug) }}"
                    class="name flex items-center gap-1.5 px-[3vw] cursor-pointer">
                    <div class="ball w-3 sm:w-3.5 aspect-square rounded-full"></div>
                    <h1 class="text-lg sm:text-xl md:text-[22px] xl:text-2xl">{{ $section->name }}</h1>
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-5 sm:w-[22px] lg:w-6"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="#c0bbbb">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>

                    </div>
                    <span
                        class="show text-[#9d9999] font-semibold tracking-wide -ml-3 opacity-0 pointer-events-none transition-all">Show
                        All</span>
                </a>

                {{-- ### SLIDER ### --}}
                <div class="sliderParent relative">
                    <div class="slider w-full overflow-x-scroll overflow-y-hidden">
                        <div class="controls">
                            <div
                                class="left hidden absolute top-[50%] left-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>

                            </div>
                            <div
                                class="right hidden absolute top-[50%] right-0 -translate-y-[50%] text-white p-3 bg-[rgba(56,56,56,1)] rounded-full z-50 cursor-pointer transition-all mx-0.5 drop-shadow-2xl hover:bg-[#565656] active:scale-90">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </div>
                        </div>
                        <div class="wrapper flex w-fit gap-1.5 sm:gap-2.5 px-[3vw] py-4 -mt-2.5">
                            @if ($section->posts->isEmpty())
                                <h1 class="text-white text-lg">No Post Found</h1>
                            @else
                                @foreach ($section->posts as $post)
                                    <a href="{{ route('post', $post->slug) }}"
                                        class="slide flex flex-col gap-2 w-[42vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[14.9vw] ">
                                        <div  class="shadow-current w-full cursor-pointer relative rounded-sm aspect-[2/3] content bg-cover transition-all md:hover:scale-[1.1]">
                                            <picture>
                                                @php
                                                    $posterImg = json_decode($post->posters);

                                                    if ($posterImg->type == 'url') {
                                                        $posterDefault = $posterImg->img->default;
                                                        $posterLG = $posterImg->img->large ?? null;
                                                        $posterSM = $posterImg->img->small ?? null;
                                                    } elseif ($posterImg->type == 'custom') {
                                                        $poster = '/uploads/posters/' . $posterImg->img->default;
                                                        $posterLG =
                                                            '/uploads/posters/' . ($posterImg->img->large ?? '');
                                                        $posterSM =
                                                            '/uploads/posters/' . ($posterImg->img->small ?? '');
                                                    }
                                                @endphp

                                                @isset($posterSM)
                                                    <source media="(max-width: 600px)" srcset="{{ $posterSM }}">
                                                @endisset

                                                @isset($posterLG)
                                                    <source media="(min-width: 2500px)" srcset="{{ $posterLG }}">
                                                @endisset

                                                <img alt="Poster" srcset="{{ $posterDefault }}"
                                                    class="absoluteCenter w-full h-full -z-10">
                                            </picture>
                                            <div
                                                class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0">
                                            </div>
                                            <div class="info absoluteCenter  text-white font-normal pointer-events-none transition-all opacity-0 w-full px-1 mt-10">
                                                <div class="w-fit mx-auto flex flex-col">
                                                    <span
                                                        class="match text-[#54ff96] font-semibold">{{ $post->rating * 10 }}%
                                                        Match</span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="details px-1 flex flex-col gap-1">
                                            <span
                                                class="title break-words font-semibold text-zinc-300 line-clamp-1">{{ $post->title }}</span>

                                            <p
                                                class="text-zinc-500 line-clamp-3 text-sm @if (!$loop->parent->first) hidden @endif">
                                                {{ $post->synopsis }}</p>

                                            <div class="flex items-center gap-4">
                                                <span
                                                    class="text-rose-500">{{ $post->type == 'tv' ? 'TV' : 'Movie' }}</span>
                                                @php
                                                    $postDate = new DateTime($post->release_date);
                                                    $postYear = $postDate->format('Y');
                                                @endphp

                                                <div class="size-1.5 rounded-full bg-zinc-500"></div>

                                                <span
                                                    class="season text-indigo-500 break-words">{{ $postYear }}</span>
                                            </div>
                                        </div>

                                    </a>
                                @endforeach
                            @endif


                        </div>
                    </div>

                </div>
                {{-- ### SLIDER END ### --}}

            </section>
        @endforeach

    </div>
@endsection
