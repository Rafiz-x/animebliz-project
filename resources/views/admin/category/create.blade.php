@php
    $namespace = 'category_create';
@endphp
@extends('admin.layout')

@section('title', 'Create Category')

@section('name', 'admin.category.create')

@section('content')
    <div class="create_category">
        <div class="form w-full sm:max-w-96 md:max-w-[450px] lg:max-w-[600px] xl:max-w-[800px] mx-auto">
            <form action="{{ route('admin.category.create.handle') }}" method="POST" class="flex flex-col gap-8">
                @csrf
                <div class="field text-white flex flex-col gap-2">
                    <label for="name" class="lg:text-lg xl:text-xl">Name</label>
                    <input class="w-full" type="text" name="category_name" id="category_name" placeholder="Choose a Category Name"
                        autocomplete="off">

                    <div class="checking hidden items-center gap-2 text-indigo-400">
                        <div
                            class="loader border-[3px] rounded-full border-l-[transparent] animate-spin border-neutral-100 !bg-transparent">
                        </div>
                        <span>Checking...</span>
                    </div>


                    <span class="error !text-red-500">
                    </span>

                    <span class="success !text-green-500">
                    </span>

                </div>

                <div class="field text-white flex flex-col gap-2">
                    <div class="flex items-center justify-between gap-5">
                        <span class="font-semibold text-md">Slug</span>

                        <div class="radioBtns flex items-center gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="slug_type" value="auto" checked>
                                <span>Auto</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer ">
                                <input type="radio" class="text-rose-400" name="slug_type" value="custom">
                                <span>Custom</span>
                            </label>
                        </div>
                    </div>

                    <input type="text" name="category_slug" id="category_slug" placeholder="e.g. animation, fantasy">

                    <div class="checking hidden items-center gap-2 text-indigo-400">
                        <div
                            class="loader border-[3px] rounded-full border-l-[transparent] animate-spin border-neutral-100 !bg-transparent">
                        </div>
                        <span>Checking...</span>
                    </div>

                    <span class="error !text-red-500"></span>

                    <span class="success !text-green-500"></span>

                </div>

                <div class="existing_categories">
                    <ol
                        class="grid text-sm sm:text-base grid-cols-2 xs:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-2 sm:gap-y-4 list-decimal list-inside text-white p-2 sm:p-4 md:pl-5 bg-slate-700 rounded-md w-full">
                        @foreach ($categories as $category)
                            <li>{{ $category->name }}</li>
                        @endforeach
                    </ol>
                    <div class="info mt-2 flex gap-2 text-amber-500 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                        </svg>

                        <p>Make sure your category name don't match one of those!</p>
                    </div>
                </div>

                <button type="submit"
                    class="save text-white px-2.5 py-1.5 rounded-md bg-indigo-500 w-fit mx-auto flex items-center gap-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                    </svg>
                    <span>Create</span>
                </button>

            </form>
        </div>
    </div>
@endsection
