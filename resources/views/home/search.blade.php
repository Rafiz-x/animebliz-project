@extends('home.master')

@section('title', "Search | $APP_NAME")


@section('header')

@section('main')
    <section class="h-fit mx-auto w-full px-[3vw] pt-10 flex flex-col gap-5">
        <div class="name flex mx-auto items-center justify-center gap-1.5 px-[3vw]">
            {{-- <div class="ball w-1.5 sm:w-2.5 md:w-3 lg:w-4 aspect-square rounded-full bg-[#ff5f5f]"></div> --}}
            <h1 class="text-lg w-fit sm:text-xl md:text-2xl xl:text-2xl font-semibold text-white relative">
                Search Result For : {{ $query }}</h1>
        </div>



        <x-posts-result :posts="$posts" />


    </section>
@endsection
