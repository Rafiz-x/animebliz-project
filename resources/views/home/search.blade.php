@php
    define('SHOW_MENU', false);
    define('SHOW_SEARCH', false);
@endphp

@extends('home.master')

@section('title', "Search | $APP_NAME")


@section('header')

@section('main')
        <section>
            {{-- SEARCH START --}}

            <div id="searchArea" class="w-full h-screen bg-[#161716] z-50 p-4 md:p-6 transition-all">

                <div class="wrapper h-fit flex flex-col gap-5 mx-auto xl:max-w-[90vw]">

                    <div
                        class="flex flex-col gap-6 sm:flex-row sm:items-center sm:gap-4 md:gap-6 py-2 sm:py-3 md:py-4 lg:py-5">
                        <div id="searchAreaBack" title="Back"
                            class="back  text-white flex justify-center items-center w-fit rounded-full p-2 bg-[#272727] cursor-pointer transition-all hover:bg-[#4d4d4d] active:scale-90">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="size-6 sm:size-8 pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </div>

                        <div
                            class="top lg:max-w-[1000px] lg:mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-center sm:grow gap-1 md:gap-2 lg:gap-3 xl:gap-4">

                            {{-- <div class="flex flex-col gap-2 sm:grow sm:gap"> --}}
                            <div class="inputBox w-full flex sm:flex-1 items-center rounded-md pr-2 bg-[rgb(58,58,58)]">
                                <input type="text"
                                    class="caret-[#ff5f5f] grow bg-transparent p-2 rounded-md text-white outline-none"
                                    name="searchParams" placeholder="Search..." aria-label="Search" spellcheck="false"
                                    autocomplete="off">
                                <div
                                    class="icon text-white hidden cursor-pointer hover:bg-slate-500 rounded-full p-1 transition-all">
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
        </section>
@endsection
