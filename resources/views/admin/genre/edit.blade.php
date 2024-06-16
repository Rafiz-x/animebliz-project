@php
    $namespace = 'genre_edit_withSlug';
@endphp

@extends('admin.layout')

@section('title', 'Edit Genre')

@section('name', 'admin.genre.create')

@section('content')
    
    <div class="edit_genre w-full sm:max-w-96 md:max-w-[450px] lg:max-w-[600px] xl:max-w-[800px] mx-auto">
    @if ($genreFound)
        <div class="form w-full">
            <form action="{{ route('admin.genre.edit.handle') }}" method="POST" class="flex flex-col gap-8">
                @csrf

                <input type="text" name="genre_id" id="genre_id" value="{{ $currentGenre->id }}" onchange="window.location.reload()" hidden>

                <div class="field text-white flex flex-col gap-2">
                    <label for="name" class="lg:text-lg xl:text-xl">Name</label>
                    <input class="w-full" type="text" name="genre_name" id="genre_name" value="{{ $currentGenre->name }}" placeholder="Choose a Genre Name"
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
                                <input type="radio" name="slug_type" value="auto">
                                <span>Auto</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer ">
                                <input type="radio" class="text-rose-400" name="slug_type" value="custom" checked>
                                <span>Custom</span>
                            </label>
                        </div>
                    </div>

                    <input type="text" name="genre_slug" id="genre_slug" value="{{ $currentGenre->slug }}" placeholder="e.g. animation, fantasy">

                    <div class="checking hidden items-center gap-2 text-indigo-400">
                        <div
                            class="loader border-[3px] rounded-full border-l-[transparent] animate-spin border-neutral-100 !bg-transparent">
                        </div>
                        <span>Checking...</span>
                    </div>

                    <span class="error !text-red-500"></span>

                    <span class="success !text-green-500"></span>

                </div>

                <div class="existing_genres">
                    <ol
                        class="grid text-sm sm:text-base grid-cols-2 xs:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-2 sm:gap-y-4 list-decimal list-inside text-white p-2 sm:p-4 md:pl-5 bg-slate-700 rounded-md w-full">
                        @foreach ($genres as $name => $slug)
                            <li><a href="{{ route('admin.genre.edit.withSlug', $slug) }}" class="hover:underline">{{ $name }}</a></li>
                        @endforeach
                    </ol>
                    <div class="info mt-2 flex gap-2 text-amber-500 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                        </svg>

                        <p>Make sure your genre name doesn't match any of those!</p>
                    </div>
                </div>

                <button type="submit"
                    class="save text-white px-2.5 py-1.5 rounded-md bg-indigo-500 w-fit mx-auto flex items-center gap-2 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                      </svg>                      
                    <span>Update</span>
                </button>

            </form>
        </div>
    @endif

    @if (!$genreFound)
        <h1>G</h1>        
    @endif

    </div>
@endsection