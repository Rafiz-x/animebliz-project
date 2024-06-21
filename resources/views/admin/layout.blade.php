@php
    $app_name = view()->shared('app_name');
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Animebliz - Admin Dashboard, for managing the application, providing a clean and efficient interface with a dark theme for better usability.">

    <title>@yield('title') | {{ $app_name }}</title>

    <link rel="manifest" href="{{ asset('manifest-admin.json') }}">

    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>

    @vite('resources/css/admin.css')
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/admin-B1RwOSa8.css') }}"> --}}
</head>

<body data-barba="wrapper">
    <header>
        <nav
            class="flex justify-between items-center px-4 sm:px-6 lg:px-8 py-4 text-white bg-gray-800 shadow-sm shadow-gray-600">

            <div class="sidebarArrow hidden sm:flex w-fit text-white p-2 bg-slate-600 rounded-full cursor-pointer z-40">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="size-6 left pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="right rotate-180 size-6 w-0 pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>

            </div>

            <div
                class="menu flex sm:hidden transition-all hover:bg-gray-700 active:bg-gray-600 active:scale-95 rounded-full p-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="hamburger size-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="close size-8 w-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                </svg>





            </div>

            <h1 class="page_title_heading sm:text-lg">@yield('title')</h1>

            <div class="profile relative flex justify-center items-center gap-1 cursor-pointer">
                <div class="img border-[2px] border-slate-700 size-12 rounded-full overflow-hidden">
                    <img src="{{ asset('img/profile.png') }}" alt="" class="">
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 chevron">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>

                <div
                    class="menu h-0 absolute top-16 right-0 min-w-full bg-slate-700 text-white flex flex-col rounded-md overflow-hidden z-50">
                    <a href="{{ route('admin.profile') }}">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <span>Profile</span>
                    </a>
                    <a href="{{ route('admin.logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>

                        <span>Logout</span>

                    </a>
                </div>

            </div>

        </nav>
    </header>

    <main class="relative mt-1 flex ">
        <div
            class="sidebar fixed sm:static -left-[300px] w-fit h-[calc(100vh-86px)] overflow-y-auto bg-gray-800 sm:px-6 sm:py-10">
            <div class="wrapper relative h-fit flex flex-col gap-4 overflow-hidden transition-all">

                <div class="list flex flex-col gap-3.5">
                    <h1 class="uppercase text-slate-400 font-[500] pl-5">Pages</h1>
                    <div class="items flex flex-col gap-1">
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all {{ Route::currentRouteName() == 'admin.home' ? 'active' : null }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-6 fillSvg">
                                    <path fill-rule="evenodd"
                                        d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Home</span>
                            </a>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all {{ Route::currentRouteName() == 'admin.trending' ? 'active' : null }}">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M13.5 4.938a7 7 0 1 1-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 0 1 .572-2.759 6.026 6.026 0 0 1 2.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0 0 13.5 4.938ZM14 12a4 4 0 0 1-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 0 0 1.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 0 1 1.315-4.192.447.447 0 0 1 .431-.16A4.001 4.001 0 0 1 14 12Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span>Trending</span>
                            </a>
                        </div>

                    </div>

                </div>

                <hr class="border-slate-500 mb-2">

                <div class="list flex flex-col gap-3.5">
                    <h1 class="uppercase text-slate-400 font-[500] pl-5">Menu</h1>
                    <div class="items flex flex-col gap-1">
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="{{ route('admin.dashboard') }}"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                <span>Dashboard</span>
                            </a>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden dropdown">
                            <div
                                class="flex relative text-white gap-5 px-4 py-2 cursor-pointer active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0 1 18 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0 1 18 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 0 1 6 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5" />
                                </svg>

                                <span>Posts</span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 chevron absolute top-[50%] -translate-y-[50%] right-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <ul class="dropdownItems h-0 flex flex-col gap-2 text-slate-300 text-base pl-10 pt-1">
                                <li>
                                    <a href="{{ route('post.all') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>All</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('post.create') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('post.edit') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="item w-56 rounded-sm overflow-hidden dropdown">
                            <div
                                class="flex relative text-white gap-5 px-4 py-2 cursor-pointer active:scale-95 sm:active:scale-90 transition-all">
                                <svg width="512" height="512" viewBox="0 0 512 512" style="color:#fff"
                                    xmlns="http://www.w3.org/2000/svg" class="size-6">
                                    <rect width="512" height="512" x="0" y="0" rx="0"
                                        fill="transparent" stroke="transparent" stroke-width="0"
                                        stroke-opacity="100%" paint-order="stroke">
                                    </rect><svg width="512px" height="512px" viewBox="0 0 24 24" fill="#fff"
                                        x="0" y="0" role="img" style="display:inline-block;vertical-align:middle"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g fill="#fff">
                                            <path fill="currentColor"
                                                d="M4.343 1.408L22.374 19.44a1.5 1.5 0 1 1-2.121 2.122l-4.596-4.596L12.12 20.5L8 16.38V19a1 1 0 1 1-2 0v-4a1 1 0 0 0-1.993-.117L4.001 15v1a1 1 0 1 1-2 0V7.214A7.976 7.976 0 0 1 4.17 1.587l.173-.179Zm.241 3.07l-.051.11a5.993 5.993 0 0 0-.522 2.103l-.01.31v.119a5.983 5.983 0 0 0 1.58 4.003l.176.185l6.364 6.364l2.828-2.829L4.584 4.478Z">
                                            </path>
                                        </g>
                                    </svg>
                                </svg>

                                <span>Genre</span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 chevron absolute top-[50%] -translate-y-[50%] right-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <ul class="dropdownItems h-0 flex flex-col gap-2 text-slate-300 text-base pl-10 pt-1">
                                <li>
                                    <a href="{{ route('admin.genre.all') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>All</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.genre.create') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.genre.edit') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden dropdown">
                            <div
                                class="flex relative text-white gap-5 px-4 py-2 cursor-pointer active:scale-95 sm:active:scale-90 transition-all">
                                <svg class="size-6" viewBox="0 0 24 24" fill="#fff" x="0" y="0" role="img"
                                    style="display:inline-block;vertical-align:middle"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g fill="#fff">
                                        <path fill="currentColor"
                                            d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4s4-1.794 4-4s-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2s2 .897 2 2s-.897 2-2 2z">
                                        </path>
                                    </g>
                                </svg>

                                <span>Category</span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 chevron absolute top-[50%] -translate-y-[50%] right-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <ul class="dropdownItems h-0 flex flex-col gap-2 text-slate-300 text-base pl-10 pt-1">
                                <li>
                                    <a href="{{ route('admin.category.all') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>All</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.category.create') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.category.edit') }}"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z">
                                    </path>
                                </svg>
                                <span>Collections</span>
                            </a>
                        </div>

                    </div>
                </div>

                <hr class="border-slate-500 mb-2">

                <div class="list flex flex-col gap-3.5">
                    <h1 class="uppercase text-slate-400 font-[500] pl-5">Manage</h1>
                    <div class="items flex flex-col gap-1">

                        <div class="item w-56 rounded-sm overflow-hidden dropdown">
                            <div
                                class="flex relative text-white gap-5 px-4 py-2 cursor-pointer active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6"
                                    style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                                    </path>
                                </svg>

                                <span>Admin</span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 chevron absolute top-[50%] -translate-y-[50%] right-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <ul class="dropdownItems h-0 flex flex-col gap-2 text-slate-300 text-base pl-10 pt-1">
                                <li>
                                    <a href="#"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Delete</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden dropdown">
                            <div
                                class="flex relative text-white gap-5 px-4 py-2 cursor-pointer active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6"
                                    style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                                    </path>
                                </svg>

                                <span>User</span>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="size-5 chevron absolute top-[50%] -translate-y-[50%] right-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                            <ul class="dropdownItems h-0 flex flex-col gap-2 text-slate-300 text-base pl-10 pt-1">
                                <li>
                                    <a href="#"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Create</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="!bg-transparent hover:text-white flex items-center gap-2 hover:translate-x-2 transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                        <span>Delete</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                <span>Links</span>
                            </a>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                <span>Comments</span>
                            </a>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                <span>Reports</span>
                            </a>
                        </div>
                    </div>

                </div>

                <hr class="border-slate-500 mb-2">

                <div class="list flex flex-col gap-3.5">
                    <h1 class="uppercase text-slate-400 font-[500] pl-5">Settings</h1>
                    <div class="items flex flex-col gap-1">
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                <span>Application</span>
                            </a>
                        </div>
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                <span>Configuration</span>
                            </a>
                        </div>

                    </div>

                </div>

                <hr class="border-slate-500 mb-2">

                <div class="list flex flex-col gap-3.5">
                    <h1 class="uppercase text-slate-400 font-[500] pl-5">Account</h1>
                    <div class="items flex flex-col gap-1">
                        <div class="item w-56 rounded-sm overflow-hidden">
                            <a href="#"
                                class="flex text-white gap-5 px-4 py-2 active:scale-95 sm:active:scale-90 transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                                <span>My Profile</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="!h-[calc(100vh-86px)] flex-1 overflow-y-auto work_area_parent relative">
            <div class="work_area h-fit p-2 sm:p-4 md:p-6 lg:p-8" data-barba="container"
                data-barba-namespace="@php
if(isset($namespace)){
                         echo $namespace;
                    }else{
                        echo Route::currentRouteName();
                    } @endphp">

                <input type="text" id="current_page_title" value="@yield('title')" hidden>
                @yield('content')
            </div>

            <div class="loading-overlay fixed top-0 left-0 bg-slate-800 bg-opacity-40 z-50 w-full h-full">
                <div class=" absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] text-rose-400">
                    <div class="loader">
                        <div class="dot"></div>
                    </div>
                    <div class="loader">
                        <div class="dot"></div>
                    </div>
                    <div class="loader">
                        <div class="dot"></div>
                    </div>
                    <div class="loader">
                        <div class="dot"></div>
                    </div>
                    <div class="loader">
                        <div class="dot"></div>
                    </div>
                    <div class="loader">
                        <div class="dot"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker-admin.js')
                    .then(registration => {
                        console.log('Service Worker registered with scope:', registration.scope);
                    })
                    .catch(error => {
                        console.log('Service Worker registration failed:', error);
                    });
            });
        }
    </script>



    @vite('resources/js/admin.js')
    {{-- <script src="{{ asset('build/assets/admin-1w2qq6bH.js') }}"></script> --}}

</body>

</html>
