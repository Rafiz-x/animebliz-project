@extends('home.master')


@section('title', "My List | $APP_NAME")

@section('main')
    <section class="h-fit mx-auto w-full px-[3vw] pt-10 flex flex-col gap-5">
        <div class="name flex mx-auto items-center justify-center gap-1.5 px-[3vw]">
            <div class="ball w-3 sm:w-3.5 md:w-4 lg:w-5 aspect-square rounded-full bg-[#ff5f5f]"></div>
            <h1 class="text-lg w-fit sm:text-xl md:text-2xl xl:text-3xl font-semibold text-white relative">
               My List</h1>
        </div>


        <div
            class="results grid sm:px-2 gap-2 md:gap-3 xl:gap-3 grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7">
            {{-- w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] --}}

            <div
                class="item shadow-current active:scale-95 transition-all cursor-pointer relative overflow-hidden aspect-[2/3]  md:hover:scale-[1.1] rounded-[4px]">
                <a href="#" class="content w-full h-full group">
                    <picture>
                        <source media="(min-width: 500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                        <source media="(min-width: 1500px)" srcset="{{ asset('img/demonSlayer.jpg') }}">
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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
                        <img alt="Image" srcset="{{ asset('img/demonSlayer.jpg') }}" class="w-full h-full">
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

    </section>
@endsection
