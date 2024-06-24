@php
    use Illuminate\Support\Facades\Route;

    !defined('SHOW_MENU') ? define('SHOW_MENU', true) : null;
    !defined('SHOW_SEARCH') ? define('SHOW_SEARCH', true) : null;
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta name="keywords" content="Smoothyflix, Movie, TV, Anime, Web Series, Animeflix, Animebliz, Smooth Movies">
    <meta name="description"
        content="Animebliz is a web based app which provides free anime(s) to watch at free of cost. With minimal ads and user friendly UI">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">

    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#000000">






    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-CCpbI91B.css') }}"> --}}

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('/js/barba.js') }}"></script>
    <script src="{{ asset('js/gsap.js') }}"></script>

</head>

<body data-barba="wrapper" class="pt-16 pb-24">

    {{-- HEADER  START --}}
    <header>
        {{-- MENU & SEARCH ICON - START --}}

        {{-- <div class="menu drop-shadow-2xl block fixed top-0 left-0 size-16 sm:size-20 bg-[#6b45c5] text-white z-40" style="border-radius:0% 100% 100% 0% / 100% 0% 100% 0%"> --}}

        <nav
            class="fixed flex justify-between sm:justify-start sm:gap-4 md:gap-6 lg:gap-8 xl:gap-10 items-center w-full top-0 left-0 p-2 sm:px-4 sm:py-2.5 z-40 bg-gray-800 bg-opacity-80 backdrop-blur-sm h-16">

            <div class="menu text-white hover:text-neutral-400 size-8 sm:size-10">
                <span id="menuIcon" class="transition-all active:scale-90 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="w-full h-full pointer-events-none">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </span>
            </div>

            <a href="{{ route('home') }}" class="navlogo">
                <h1
                    class="text-neutral-200 font-extrabold text-2xl md:text-3xl bg-gradient-to-r from-rose-400 to-violet-500 text-transparent bg-clip-text">
                    SmoothyFlix</h1>
            </a>

            <div class="search text-white">

                <div class="searchBoxParent sm:static">
                    <div class="filter sm:hidden bg-violet-600 hover:bg-violet-500 cursor-pointer rounded-md p-2">
                        <svg class="size-6" fill="#fff" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1595 295q17 41-14 70l-493 493v742q0 42-39 59-13 5-25 5-27 0-45-19l-256-256q-19-19-19-45v-486l-493-493q-31-29-14-70 17-39 59-39h1280q42 0 59 39z" />
                        </svg>
                    </div>

                    <form id="navSearchForm" class="flex-1" action="/search/query" method="GET">
                        <div
                            class="rounded-sm searchBox flex-1 flex items-center gap-1 ring-1 ring-neutral-200 px-2 py-1 bg-neutral-200 text-neutral-700">
                            <input type="text" placeholder="Search here"
                                class="caret-indigo-500 border-0 bg-transparent transition-all w-full focus:!ring-[0px] focus:outline-[0px] p-1">

                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6 sm:size-7 cursor-pointer text-neutral-700">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                        clip-rule="evenodd" />
                            </button>
                            </svg>
                        </div>
                    </form>
                </div>

                <div
                    class="searchIcon sm:hidden flex justify-center items-center gap-1 transition-all cursor-pointer hover:text-neutral-400">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="searchSVG size-7 sm:size-8 pointer-events-none">
                        <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="hidden closeSVG size-7 sm:size-8 pointer-events-none">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>

            <div class="social hidden sm:flex items-center gap-1">
                <a href="#" class="telegram" title="Join Our Telegram Channel">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="size-8 md:size-10"
                        viewBox="0 0 48 48">
                        <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"></path>
                        <path fill="#fff"
                            d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z">
                        </path>
                        <path fill="#b0bec5"
                            d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z">
                        </path>
                        <path fill="#cfd8dc"
                            d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z">
                        </path>
                    </svg>
                </a>
                <a href="#" class="discord" title="Join Our Discord Server">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="size-8 md:size-10"
                        viewBox="0 0 48 48">
                        <path fill="#8c9eff"
                            d="M42,45.478c0,0.416-0.479,0.65-0.807,0.395L33,38.999l0.781,2.343 C33.889,41.666,33.648,42,33.306,42H10c-2.761,0-5-2.239-5-5V11c0-2.761,2.239-5,5-5h27c2.761,0,5,2.239,5,5V45.478z">
                        </path>
                        <path fill="#fff"
                            d="M32.627,17.295c-0.027-0.041-0.05-0.066-0.089-0.095c-0.383-0.282-2.803-1.99-5.627-2.2l-0.27,0.55 c2.78,0.67,4.05,1.64,5.38,2.83C29.73,17.21,27.46,16,23.5,16s-6.23,1.21-8.52,2.38c1.33-1.19,2.85-2.27,5.38-2.83L20.09,15 c-2.957,0.284-5.261,1.926-5.629,2.201c-0.038,0.029-0.061,0.053-0.087,0.093c-0.333,0.509-2.866,4.607-3.362,12.145 c-0.007,0.113,0.032,0.232,0.109,0.316c2.555,2.804,6.16,3.185,7.06,3.237c0.134,0.008,0.256-0.053,0.336-0.161l0.794-1.061 c-1.57-0.54-3.36-1.51-4.9-3.27c1.84,1.38,4.61,2.5,9.09,2.5s7.25-1.12,9.09-2.5c-1.54,1.76-3.33,2.73-4.9,3.27l0.794,1.061 c0.08,0.107,0.202,0.168,0.336,0.161c0.9-0.052,4.505-0.434,7.06-3.237c0.076-0.084,0.116-0.203,0.109-0.316 C35.493,21.907,32.962,17.808,32.627,17.295z M20,28c-1.1,0-2-1.12-2-2.5s0.9-2.5,2-2.5s2,1.12,2,2.5S21.1,28,20,28z M27,28 c-1.1,0-2-1.12-2-2.5s0.9-2.5,2-2.5s2,1.12,2,2.5S28.1,28,27,28z">
                        </path>
                        <path
                            d="M26.91,15c2.824,0.211,5.244,1.918,5.627,2.2c0.039,0.029,0.063,0.054,0.089,0.095 c0.335,0.513,2.866,4.612,3.362,12.144c0.007,0.113-0.032,0.232-0.109,0.316c-2.555,2.804-6.16,3.185-7.06,3.237 c-0.008,0-0.015,0.001-0.023,0.001c-0.125,0-0.238-0.06-0.313-0.161L27.69,31.77c1.57-0.54,3.36-1.51,4.9-3.27 c-1.84,1.38-4.61,2.5-9.09,2.5s-7.25-1.12-9.09-2.5c1.54,1.76,3.33,2.73,4.9,3.27l-0.794,1.061 c-0.076,0.101-0.189,0.161-0.313,0.161c-0.008,0-0.015,0-0.023-0.001c-0.9-0.052-4.505-0.434-7.06-3.237 c-0.076-0.084-0.116-0.203-0.109-0.316c0.496-7.538,3.03-11.636,3.362-12.145c0.026-0.04,0.049-0.064,0.087-0.093 c0.368-0.275,2.671-1.917,5.629-2.201l0.27,0.55c-2.53,0.56-4.05,1.64-5.38,2.83C17.27,17.21,19.54,16,23.5,16s6.23,1.21,8.52,2.38 c-1.33-1.19-2.6-2.16-5.38-2.83L26.91,15 M27,28c1.1,0,2-1.12,2-2.5c0-1.38-0.9-2.5-2-2.5s-2,1.12-2,2.5C25,26.88,25.9,28,27,28 M20,28c1.1,0,2-1.12,2-2.5c0-1.38-0.9-2.5-2-2.5s-2,1.12-2,2.5C18,26.88,18.9,28,20,28 M20.386,14.469l-0.344,0.033 c-3.066,0.294-5.436,1.966-5.88,2.298c-0.085,0.063-0.148,0.131-0.206,0.22c-0.299,0.457-2.936,4.691-3.443,12.386 c-0.017,0.251,0.07,0.501,0.238,0.685c2.653,2.912,6.335,3.338,7.401,3.4l0.014,0.001l0.037,0.001c0.282,0,0.542-0.132,0.714-0.362 l0.794-1.061l0.411-0.549l-0.649-0.223c-0.285-0.098-0.563-0.206-0.835-0.323c1.445,0.352,3.06,0.526,4.863,0.526 s3.418-0.174,4.863-0.526c-0.272,0.118-0.55,0.225-0.835,0.323l-0.649,0.223l0.411,0.549l0.794,1.061 c0.172,0.23,0.432,0.362,0.714,0.362h0.014l0.037-0.001c1.065-0.061,4.748-0.488,7.401-3.4c0.168-0.184,0.255-0.434,0.238-0.685 c-0.506-7.692-3.143-11.927-3.442-12.384c-0.059-0.09-0.124-0.159-0.211-0.223c-0.468-0.345-2.951-2.077-5.887-2.297l-0.337-0.025 l-0.149,0.303l-0.27,0.55l-0.17,0.347C25.256,15.564,24.422,15.5,23.5,15.5s-1.756,0.064-2.521,0.177l-0.17-0.347l-0.27-0.55 L20.386,14.469L20.386,14.469z M27,27.5c-0.813,0-1.5-0.916-1.5-2s0.687-2,1.5-2s1.5,0.916,1.5,2S27.813,27.5,27,27.5L27,27.5z M20,27.5c-0.813,0-1.5-0.916-1.5-2s0.687-2,1.5-2s1.5,0.916,1.5,2S20.813,27.5,20,27.5L20,27.5z"
                            opacity=".07"></path>
                        <path
                            d="M26.91,15c2.824,0.211,5.244,1.918,5.627,2.2c0.039,0.029,0.063,0.054,0.089,0.095 c0.335,0.513,2.866,4.612,3.362,12.144c0.007,0.113-0.032,0.232-0.109,0.316c-2.555,2.804-6.16,3.185-7.06,3.237 c-0.008,0-0.015,0.001-0.023,0.001c-0.125,0-0.238-0.06-0.313-0.161L27.69,31.77c1.57-0.54,3.36-1.51,4.9-3.27 c-1.84,1.38-4.61,2.5-9.09,2.5s-7.25-1.12-9.09-2.5c1.54,1.76,3.33,2.73,4.9,3.27l-0.794,1.061 c-0.076,0.101-0.189,0.161-0.313,0.161c-0.008,0-0.015,0-0.023-0.001c-0.9-0.052-4.505-0.434-7.06-3.237 c-0.076-0.084-0.116-0.203-0.109-0.316c0.496-7.538,3.03-11.636,3.362-12.145c0.026-0.04,0.049-0.064,0.087-0.093 c0.368-0.275,2.671-1.917,5.629-2.201l0.27,0.55c-2.53,0.56-4.05,1.64-5.38,2.83C17.27,17.21,19.54,16,23.5,16s6.23,1.21,8.52,2.38 c-1.33-1.19-2.6-2.16-5.38-2.83L26.91,15 M27,28c1.1,0,2-1.12,2-2.5c0-1.38-0.9-2.5-2-2.5s-2,1.12-2,2.5C25,26.88,25.9,28,27,28 M20,28c1.1,0,2-1.12,2-2.5c0-1.38-0.9-2.5-2-2.5s-2,1.12-2,2.5C18,26.88,18.9,28,20,28 M20.683,13.938l-0.688,0.066 c-3.199,0.307-5.669,2.049-6.132,2.396c-0.132,0.099-0.235,0.209-0.325,0.347c-0.5,0.765-3.019,4.966-3.523,12.627 c-0.025,0.386,0.108,0.771,0.367,1.055c2.78,3.051,6.628,3.498,7.742,3.562l0.029,0.002l0.051,0.001 c0.441,0,0.847-0.205,1.114-0.562l0.794-1.061l0.408-0.545C21.453,31.942,22.446,32,23.5,32s2.047-0.058,2.981-0.176l0.408,0.545 l0.794,1.061c0.267,0.357,0.673,0.562,1.114,0.562h0.029l0.052-0.002c1.113-0.064,4.961-0.511,7.741-3.562 c0.259-0.284,0.393-0.669,0.367-1.055c-0.504-7.657-3.023-11.86-3.522-12.625c-0.092-0.141-0.198-0.253-0.333-0.352 c-0.487-0.359-3.073-2.163-6.146-2.393l-0.674-0.05l-0.298,0.607l-0.27,0.55l-0.011,0.022C25.045,15.047,24.306,15,23.5,15 s-1.545,0.047-2.231,0.132l-0.011-0.022l-0.27-0.55L20.683,13.938L20.683,13.938z M27,27c-0.473,0-1-0.616-1-1.5s0.527-1.5,1-1.5 s1,0.616,1,1.5S27.473,27,27,27L27,27z M20,27c-0.473,0-1-0.616-1-1.5s0.527-1.5,1-1.5s1,0.616,1,1.5S20.473,27,20,27L20,27z"
                            opacity=".05"></path>
                    </svg>
                </a>
            </div>

            <div class="login hidden sm:block flex-1 text-end">
                <a href="{{ route('user.login') }}"
                    class="px-4 py-2 hidden sm:inline-block text-neutral-100 bg-indigo-600 hover:bg-indigo-500 active:scale-95 rounded-md">Login</a>
            </div>
        </nav>
        {{-- ### NAVIGATION START --}}
        <div class="nav fixed -translate-x-[300px] top-0 left-0 max-w-[350px] h-full bg-[#161716] text-white flex flex-col gap-2 px-5 py-2 z-[99999999] border-r-2 border-zinc-500">

            <div class="flex items-center gap-2 group cursor-pointer" id="closeNav">
                <div
                    class="close flex justify-center items-center w-fit p-2 rounded-full group-hover:bg-zinc-700 group-active:scale-90 group-active:bg-zinc-600 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 sm:size-6 lg:size-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
                <span class="!text-sm sm:!text-base">Close Menu</span>
            </div>

            <div class="overflow-y-auto pb-10">
                <ul class="h-fit flex flex-col gap-0.5">
                    <li><span>
                            <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">
                                <div
                                    class="flex items-center px-4 py-2 gap-5 w-64 rounded-lg hover:bg-zinc-700 active:scale-95 active:bg-zinc-600 transition-all">

                                    {{-- OUTLINE --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 outLineSvg hidden">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>

                                    {{-- FILLED --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-6 fillSvg">
                                        <path fill-rule="evenodd"
                                            d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <span>Home</span>
                                </div>
                            </a>

                        </span></li>

                    <li><span>
                            <a href="{{ route('trending') }}" class="{{ Route::is('trending') ? 'active' : '' }}">
                                <div
                                    class="flex items-center px-4 py-2 gap-5 w-64 rounded-lg hover:bg-zinc-700 active:scale-95 active:bg-zinc-600 transition-all">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 outLineSvg hidden">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z" />
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-6 fillSvg">
                                        <path fill-rule="evenodd"
                                            d="M13.5 4.938a7 7 0 1 1-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 0 1 .572-2.759 6.026 6.026 0 0 1 2.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0 0 13.5 4.938ZM14 12a4 4 0 0 1-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 0 0 1.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 0 1 1.315-4.192.447.447 0 0 1 .431-.16A4.001 4.001 0 0 1 14 12Z"
                                            clip-rule="evenodd" />
                                    </svg>


                                    <span>Trending</span>
                                </div>
                            </a>
                        </span></li>

                    <li>
                        <div class="dropdown">
                            <span class="flex w-64 item-center gap-1 cursor-pointer">
                                <div
                                    class="flex items-center w-64 px-4 py-2 justify-between pr-6 rounded-lg hover:bg-zinc-700 active:scale-95 active:bg-zinc-600 transition-all {{ Route::is('genre') ? 'active' : '' }}">
                                    {{-- NO NEED TO HIDE HERE  --}}

                                    <div class="flex items-center gap-5">
                                        <svg width="512" height="512" viewBox="0 0 512 512" style="color:#fff"
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                            <rect width="512" height="512" x="0" y="0" rx="0"
                                                fill="transparent" stroke="transparent" stroke-width="0"
                                                stroke-opacity="100%" paint-order="stroke">
                                            </rect><svg width="512px" height="512px" viewBox="0 0 24 24"
                                                fill="#fff" x="0" y="0" role="img"
                                                style="display:inline-block;vertical-align:middle"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g fill="#fff">
                                                    <path fill="currentColor"
                                                        d="M4.343 1.408L22.374 19.44a1.5 1.5 0 1 1-2.121 2.122l-4.596-4.596L12.12 20.5L8 16.38V19a1 1 0 1 1-2 0v-4a1 1 0 0 0-1.993-.117L4.001 15v1a1 1 0 1 1-2 0V7.214A7.976 7.976 0 0 1 4.17 1.587l.173-.179Zm.241 3.07l-.051.11a5.993 5.993 0 0 0-.522 2.103l-.01.31v.119a5.983 5.983 0 0 0 1.58 4.003l.176.185l6.364 6.364l2.828-2.829L4.584 4.478Z" />
                                                </g>
                                            </svg>
                                        </svg>
                                        <span>Genre</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 chevron">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>


                                </div>
                            </span>
                            <ul class="hidden">
                                @if ($genres->isEmpty())
                                    <span class="text-white">No Genre Found</span>
                                @else
                                    @foreach ($genres as $genre)
                                        <li><a href="{{ route('genre', $genre->slug) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                                </svg>
                                                {{ $genre->name }}
                                            </a></li>
                                    @endforeach

                                @endif
                            </ul>
                        </div>
                    </li>

                    <li>
                        <div class="dropdown flex flex-col">
                            <span class="flex w-64 item-center gap-1 cursor-pointer">
                                <div
                                    class="flex items-center w-64 px-4 py-2 justify-between pr-6 rounded-lg hover:bg-zinc-700 active:scale-95 active:bg-zinc-600 transition-all {{ Route::is('category') ? 'active' : '' }}">
                                    {{-- NO NEED TO HIDE HERE  --}}

                                    <div class="flex items-center gap-5">

                                        <svg width="512" height="512" viewBox="0 0 512 512" style="color:#fff"
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                            <rect width="512" height="512" x="0" y="0" rx="0"
                                                fill="transparent" stroke="transparent" stroke-width="0"
                                                stroke-opacity="100%" paint-order="stroke"></rect><svg width="512px"
                                                height="512px" viewBox="0 0 24 24" fill="#fff" x="0" y="0"
                                                role="img" style="display:inline-block;vertical-align:middle"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g fill="#fff">
                                                    <path fill="currentColor"
                                                        d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4s4-1.794 4-4s-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2s2 .897 2 2s-.897 2-2 2z" />
                                                </g>
                                            </svg>
                                        </svg>

                                        <span>Category</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 chevron">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>


                                </div>
                            </span>

                            <ul class="hidden">

                                @if ($genres->isEmpty())
                                    <span class="text-white">No Genre Found</span>
                                @else
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('category', $category->slug) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                                </svg>
                                                {{ $category->name }}
                                            </a></li>
                                    @endforeach

                                @endif
                            </ul>
                        </div>
                    </li>

                    <li><span>
                            <a href="{{ route('myList') }}" class="{{ Route::is('myList') ? 'active' : '' }}">
                                <div
                                    class="flex items-center px-4 py-2 gap-5 pr-20 rounded-lg hover:bg-zinc-700 active:scale-95 active:bg-zinc-600 transition-all">

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    <span>My List</span>
                                </div>
                            </a>
                        </span></li>
                </ul>

                <div class="flex flex-col gap-2 w-full mt-5">
                    <a href="{{ route('user.login') }}"
                        class="px-4 py-2 rounded-md bg-rose-500 hover:bg-rose-600 active:bg-rose-700 transition-all active:scale-95 shadow-md text-[15px] sm:text-base text-center">Log
                        In</a>
                    <a href="{{ route('user.signup') }}"
                        class="px-4 py-2 rounded-md bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700  transition-all active:scale-95 shadow-md text-[15px] sm:text-base text-center">Sign
                        Up</a>
                </div>
            </div>
        </div>
        {{-- ### NAVIGATION END --}}


        {{-- MENU & SEARCH ICON - END --}}
    </header>
    {{-- HEADER  END --}}




    {{-- MAIN  START --}}
    <main data-barba="container" data-barba-namespace="{{ $namespace ?? Route::currentRouteName() }}">
        @yield('main')
    </main>
    {{-- MAIN  END --}}


    <!-- Initialize Barba.js -->
    {{-- <script>
        Barba.init({
            transitions: [{
                async leave(data) {
                    const done = this.async();

                    // Your leave transition code here
                    gsap.to(data.current.container, {
                        opacity: 0,
                        duration: 0.5,
                        onComplete: done
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
                async enter(data) {
                    // Your enter transition code here
                    gsap.from(data.next.container, {
                        opacity: 0,
                        duration: 0.5
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
                async once(data) {
                    // Your initial transition code here
                    gsap.from(data.current.container, {
                        opacity: 0,
                        duration: 0.5
                    });

                    // If you have additional animations, you can chain them with GSAP or use async/await
                },
            }],
        });
    </script> --}}

    <!-- unpkg -->
    @vite('/resources/js/app.js')
    {{-- <script src="{{ asset('build/assets/app-PjMmjpBi.js') }}"></script> --}}


</body>

</html>
