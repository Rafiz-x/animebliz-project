<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    <meta name="theme-color" content="#000000">
    <meta name="description"
        content="Animebliz is a web based app which provides free anime(s) to watch at free of cost. With minimal ads and user friendly UI">

    @vite('resources/css/app.css')
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-CCpbI91B.css') }}"> --}}
</head>

<body data-barba="wrapper">
    @php
        use Illuminate\Support\Facades\Route;

        !defined('SHOW_MENU') ? define('SHOW_MENU', true) : null;
        !defined('SHOW_SEARCH') ? define('SHOW_SEARCH', true) : null;
    @endphp


    {{-- HEADER  START --}}
    <header>
        {{-- MENU & SEARCH ICON - START --}}
        @if (SHOW_MENU)
            <div
                class="menu drop-shadow-2xl block fixed top-0 left-0 size-16 sm:size-20 bg-[#6b45c5] text-white z-40"style="border-radius:0% 100% 100% 0% / 100% 0% 100% 0%">
                <span id="menuIcon"
                    class="absolute top-2.5 left-2.5 sm:top-3 sm:left-3 transition-all active:scale-90 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="size-8 sm:size-10 pointer-events-none">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </span>
            </div>

            {{-- ### NAVIGATION START --}}

            <div
                class="nav fixed -translate-x-[300px] top-0 left-0 max-w-[300px] h-full bg-[#161716]  text-white flex flex-col gap-2 px-5 py-2 z-[99999999]">
                <div id="closeNav"
                    class="close flex justify-center items-center w-fit p-2 rounded-full hover:bg-[#272727] cursor-pointer active:scale-90 active:bg-[#3d3d3d] transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>

                <div class="overflow-y-auto">
                    <ul class="h-fit flex flex-col gap-0.5">
                        <li><span>
                                <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">
                                    <div
                                        class="flex items-center px-4 py-2 gap-5 w-64 rounded-lg hover:bg-[#272727] active:scale-95 active:bg-[#3d3d3d] transition-all">

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
                                        class="flex items-center px-4 py-2 gap-5 w-64 rounded-lg hover:bg-[#272727] active:scale-95 active:bg-[#3d3d3d] transition-all">

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
                                        class="flex items-center w-64 px-4 py-2 justify-between pr-6 rounded-lg hover:bg-[#272727] active:scale-95 active:bg-[#3d3d3d] transition-all {{ Route::is('genre') ? 'active' : '' }}">
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
                                    <li><a href="{{ route('genre', 'Drama') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>
                                            Drama
                                        </a></li>
                                    <li><a href="{{ route('genre', 'Mystrious') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Mystrious
                                        </a></li>
                                    <li><a href="{{ route('genre', 'Thriller') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Thriller</a></li>
                                    <li><a href="{{ route('genre', 'Crime') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>
                                            Crime
                                        </a></li>
                                    <li><a href="{{ route('genre', 'Fantasy') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Fantasy
                                        </a></li>
                                    <li><a href="{{ route('genre', 'romantic') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Romantic
                                        </a></li>
                                </ul>
                            </div>
                        </li>

                        <li>
                            <div class="dropdown flex flex-col">
                                <span class="flex w-64 item-center gap-1 cursor-pointer">
                                    <div
                                        class="flex items-center w-64 px-4 py-2 justify-between pr-6 rounded-lg hover:bg-[#272727] active:scale-95 active:bg-[#3d3d3d] transition-all {{ Route::is('category') ? 'active' : '' }}">
                                        {{-- NO NEED TO HIDE HERE  --}}

                                        <div class="flex items-center gap-5">

                                            <svg width="512" height="512" viewBox="0 0 512 512"
                                                style="color:#fff" xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6">
                                                <rect width="512" height="512" x="0" y="0" rx="0"
                                                    fill="transparent" stroke="transparent" stroke-width="0"
                                                    stroke-opacity="100%" paint-order="stroke"></rect><svg
                                                    width="512px" height="512px" viewBox="0 0 24 24" fill="#fff"
                                                    x="0" y="0" role="img"
                                                    style="display:inline-block;vertical-align:middle"
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
                                    <li><a href="{{ route('category', 'Popular') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>

                                            Popular</a></li>
                                    <li><a href="{{ route('category', 'Top-Rated') }}"> <svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Top-Rated</a></li>
                                    <li><a href="{{ route('category', 'Oldest') }}"> <svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Oldest</a></li>
                                    <li><a href="{{ route('category', 'Crime') }}"> <svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Crime</a></li>
                                    <li><a href="{{ route('category', 'Fantasy') }}"> <svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Fantasy</a></li>
                                    <li><a href="{{ route('category', 'romantic') }}"> <svg
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                            </svg>Romantic</a></li>
                                </ul>
                            </div>
                        </li>

                        <li><span>
                                <a href="{{ route('myList') }}" class="{{ Route::is('myList') ? 'active' : '' }}">
                                    <div
                                        class="flex items-center px-4 py-2 gap-5 pr-20 rounded-lg hover:bg-[#272727] active:scale-95 active:bg-[#3d3d3d] transition-all">

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
                        <button
                            class="px-4 py-2 rounded-md bg-[#c53d3d] hover:bg-[#ff5f5f] active:bg-[#ff6868] transition-all active:scale-95 shadow-md">Log
                            In</button>
                        <button
                            class="px-4 py-2 rounded-md bg-[#344a93] hover:bg-[#4664c7] active:bg-[#5275e6]  transition-all active:scale-95 shadow-md">Sign
                            Up</button>
                    </div>
                </div>
            </div>

            {{-- ### NAVIGATION END --}}
        @endif

        @if (SHOW_SEARCH)
            <div
                class="search drop-shadow-2xl block fixed top-0 right-0  size-14 sm:size-[60px] bg-[#6b45c5] text-white z-40 transition-all">
                <div href="{{ route('search') }}" id="searchIcon"
                    class="flex justify-center items-center gap-1 absolute top-2 right-2 sm:top-2 sm:right-2 transition-all active:scale-90 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-7 sm:size-8 pointer-events-none">
                        <path fill-rule="evenodd"
                            d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="searchBox hidden">
                        <input type="text" placeholder="Search here"
                            class="bg-transparent text-lg text-white font-semibold px-2 py-1 caret-[#ff5f5f] outline-none transition-all ">
                    </div>
                </div>
            </div>

            {{-- SEARCH START --}}

            <div id="searchArea"
                class="absolute top-0 right-0 w-full min-h-screen max-h-fit bg-[#161716] z-50 p-4 md:p-6 transition-all opacity-0">

                <div class="wrapper h-fit flex flex-col gap-5 mx-auto xl:max-w-[90vw]">

                    <div
                        class="flex flex-col gap-6 sm:flex-row sm:items-center sm:gap-4 md:gap-6 py-2 sm:py-3 md:py-4 lg:py-5">
                        <div id="searchAreaBack" title="Close"
                            class="back text-white place-self-end order-1 flex justify-center items-center w-fit rounded-full p-2 bg-[#272727] cursor-pointer transition-all hover:bg-[#4d4d4d] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 sm:size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </div>

                        <div
                            class="top lg:max-w-[1000px] lg:mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-center sm:grow gap-1 md:gap-2 lg:gap-3 xl:gap-4">

                            {{-- <div class="flex flex-col gap-2 sm:grow sm:gap"> --}}
                            <div
                                class="inputBox w-full flex sm:flex-1 items-center rounded-md pr-2 bg-[rgb(58,58,58)]">
                                <input type="text"
                                    class="caret-[#ff5f5f] grow bg-transparent p-2 rounded-md text-white outline-none"
                                    name="searchParams" placeholder="Search..." aria-label="Search"
                                    spellcheck="false" autocomplete="off">
                                <div
                                    class="icon text-white hidden cursor-pointer hover:bg-slate-500 rounded-full p-1 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6 pointer-events-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18 18 6M6 6l12 12" />
                                    </svg>

                                </div>
                            </div>
                            {{-- </div> --}}

                            <div class="grid gap-x-1.5 grid-cols-3">

                                <div class="select relative w-full">
                                    <button
                                        class="selectBtn w-full flex justify-between items-center pl-2 pr-1 py-1 gap-1 text-[#eee] font-light text-sm bg-[#4664c7] rounded-md">
                                        <span class="text">Category</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-5  pointer-events-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>

                                    <div
                                        class="option first bg-[#3a3a3a] absolute top-8 left-0 min-w-full p-1 overflow-hidden rounded-md text-[12px] font-light transition-all">
                                        <div class="itemParent w-fit mx-auto flex flex-col gap-1.5">

                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Recently Updated</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Recently Added</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Release Date ↓</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Release Date ↑</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Title A-Z</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Top Rating</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Most Watched</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="radio" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Anime Length</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="select relative w-full">
                                    <button
                                        class="selectBtn w-full flex justify-between items-center pl-2 pr-1 py-1 gap-1 text-[#eee] font-light text-sm bg-[#4664c7] rounded-md">
                                        <span class="text">Genre</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-5  pointer-events-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>

                                    <div
                                        class="option middle bg-[#3a3a3a] absolute top-8 left-0 min-w-full p-1 overflow-hidden rounded-md text-[12px] font-light transition-all delay-300">
                                        <div class="itemParent w-fit mx-auto flex flex-col gap-1.5">

                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Action</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Adventure</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Comedy</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Drama</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Ecchi</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Adventure</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Fantasy</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Horror</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Mecha</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Mystery</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Psychological</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Romance</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Sports</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Sci-Fi</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Supernatural</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Thriller</span>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="select relative w-full">
                                    <button
                                        class="selectBtn w-full flex justify-between items-center pl-2 pr-1 py-1 gap-1 text-[#eee] font-light text-sm bg-[#4664c7] rounded-md">
                                        <span class="text">Type</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-5  pointer-events-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>

                                    <div
                                        class="option last bg-[#3a3a3a] absolute top-8 left-0 min-w-full p-1 overflow-hidden rounded-md text-[12px] font-light transition-all">

                                        <div class="itemParent w-fit mx-auto flex flex-col gap-1.5">
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Movie</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">TV</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">Special</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">OVA</span>
                                            </div>
                                            <div class="item flex item-center gap-1.5">
                                                <input type="checkbox" name='recentlyUpdated'
                                                    class="outline-none border-none">
                                                <span class="text-[#eee] whitespace-nowrap">ONA</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div
                        class="results grid sm:px-2 gap-2 md:gap-3 xl:gap-3 grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7">
                        {{-- w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] --}}


                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>
                        <div
                            class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                            <a href="#" class="content w-full h-full">
                                <picture>
                                    <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                    <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                        class="w-full h-full">
                                </picture>
                                <div
                                    class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                                </div>
                                <div
                                    class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                    <span class="title">Naruto Shippuden</span>
                                    <span class="season font-semibold text-[#fd8817]">Season 1</span>
                                </div>
                            </a>

                        </div>


                    </div>

                </div>


            </div>

            {{-- SEARCH END --}}
        @endif

        {{-- MENU & SEARCH ICON - END --}}
    </header>
    {{-- HEADER  END --}}


    {{-- SEARCH START --}}


    <!--
    <div id="searchArea" class="fixed top-0 left-full w-full h-screen bg-[#161716] z-50 p-4 md:p-6 transition-all">

        <div class="scroller h-full overflow-y-auto overflow-x-hidden pb-5">
            <div class="wrapper h-fit flex flex-col gap-5 mx-auto max-w-[1280px]">

                <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:gap-4 md:gap-6 py-2 sm:py-3 md:py-4 lg:py-5">
                    <div id="searchAreaBack"
                        class="back  text-white flex justify-center items-center w-fit rounded-full p-2 bg-[#272727] cursor-pointer transition-all hover:bg-[#4d4d4d] active:scale-90">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="size-6 sm:size-8 pointer-events-none">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </div>

                    <div class="top lg:max-w-[1000px] lg:mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-center sm:grow gap-1">

                        {{-- <div class="flex flex-col gap-2 sm:grow sm:gap"> --}}
                        <div class="inputBox w-full flex sm:flex-1 items-center rounded-md pr-2 bg-[rgb(58,58,58)]">
                            <input type="text"
                                class="caret-[#ff5f5f] grow bg-transparent p-2 rounded-md text-white outline-none"
                                name="searchParams" placeholder="Search..." aria-label="Search" spellcheck="false"
                                autocomplete="off">
                            <div class="icon text-white hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6 pointer-events-none">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>

                            </div>
                        </div>
                        {{-- </div> --}}

                        <div class="grid gap-x-1.5 grid-cols-3">

                            <div class="select relative w-full">
                                <button
                                    class="selectBtn w-full flex justify-between items-center pl-2 pr-1 py-1 gap-1 text-[#eee] font-light text-sm bg-[#4664c7] rounded-md">
                                    <span class="text">Category</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5  pointer-events-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>

                                <div
                                    class="option first bg-[#3a3a3a] absolute top-8 left-0 min-w-full h-0 p-0 overflow-hidden rounded-md text-[12px] font-light transition-all">
                                    <div class="itemParent w-fit mx-auto flex flex-col gap-1.5">

                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Recently Updated</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Recently Added</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Release Date ↓</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Release Date ↑</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Title A-Z</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Top Rating</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Most Watched</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="radio" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Anime Length</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="select relative w-full">
                                <button
                                    class="selectBtn w-full flex justify-between items-center pl-2 pr-1 py-1 gap-1 text-[#eee] font-light text-sm bg-[#4664c7] rounded-md">
                                    <span class="text">Genre</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5  pointer-events-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>

                                <div
                                    class="option middle bg-[#3a3a3a] absolute top-8 left-0 min-w-full h-0 p-0 overflow-hidden rounded-md text-[12px] font-light transition-all delay-300">
                                    <div class="itemParent w-fit mx-auto flex flex-col gap-1.5">

                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Action</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Adventure</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Comedy</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Drama</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Ecchi</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Adventure</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Fantasy</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Horror</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Mecha</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Mystery</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Psychological</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Romance</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Sports</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Sci-Fi</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Supernatural</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Thriller</span>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="select relative w-full">
                                <button
                                    class="selectBtn w-full flex justify-between items-center pl-2 pr-1 py-1 gap-1 text-[#eee] font-light text-sm bg-[#4664c7] rounded-md">
                                    <span class="text">Type</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5  pointer-events-none">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>

                                </button>

                                <div
                                    class="option last bg-[#3a3a3a] absolute top-8 left-0 min-w-full h-0 p-0 overflow-hidden rounded-md text-[12px] font-light transition-all">

                                    <div class="itemParent w-fit mx-auto flex flex-col gap-1.5">
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Movie</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">TV</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">Special</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">OVA</span>
                                        </div>
                                        <div class="item flex item-center gap-1.5">
                                            <input type="checkbox" name='recentlyUpdated'
                                                class="outline-none border-none">
                                            <span class="text-[#eee] whitespace-nowrap">ONA</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div
                    class="results grid sm:px-2 gap-2 md:gap-3 xl:gap-3 grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7">
                    <div
                        class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3] group md:hover:scale-[1.1] rounded-[4px]">
                        <a href="#" class="content w-full h-full">
                            <picture>
                                <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                                <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}"
                                    class="w-full h-full">
                            </picture>
                            <div
                                class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                            </div>
                            <div
                                class="info absolute bottom-[15%] left-[50%] -translate-x-[50%] text-[12px] sm:text-sm md:text-base lg:text-lg xl:text-xl text-white font-normal text-center pointer-events-none transition-all opacity-0 w-full flex-col break-words px-0.5 group-hover:opacity-100">
                                <span class="title">Naruto Shippuden</span>
                                <span class="season font-semibold text-[#fd8817]">Season 1</span>
                            </div>
                        </a>

                    </div>
                </div>

            </div>
        </div>

    </div>
    -->

    {{-- SEARCH END --}}



    {{-- MAIN  START --}}
    <main data-barba="container" data-barba-namespace="{{ Route::currentRouteName() }}">
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


    @vite('/resources/js/app.js')
    {{-- <script src="{{ asset('build/assets/app-PjMmjpBi.js') }}"></script> --}}


</body>

</html>
