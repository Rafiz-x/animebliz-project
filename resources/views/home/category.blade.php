@extends('home.master')

@section('title', "$category->name | $APP_NAME")


@section('main')
    <section class="h-fit mx-auto w-full px-[3vw] pt-10 flex flex-col gap-5">
        <div class="name flex mx-auto items-center justify-center gap-1.5 px-[3vw]">
            <div class="ball w-3 sm:w-3.5 md:w-4 lg:w-5 aspect-square rounded-full bg-[#ff5f5f]"></div>
            <h1 class="text-lg w-fit sm:text-xl md:text-2xl xl:text-3xl font-semibold text-white relative">
                {{ $category->name }}</h1>
        </div>

       
        <x-posts-result :posts="$posts" />


    </section>
@endsection
