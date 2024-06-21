@php
    $namespace = 'post_edit';
@endphp

@extends('admin.layout')

@section('title', 'Edit Post')

@section('name', 'admin.post.edit')

@section('content')

    <div class="api text-white flex flex-col max-w-[1200px] mx-auto">
        <h1 class="text-lg ">Import Using API</h1>

        <div class="options mt-2 flex gap-5 justify-center items-center w-fit">
            <span class="tmdb active from-indigo-500 to-emerald-500 before:bg-[#1bb8d8]" data-api="tmdb">TMDB</span>

            <span class="imdb from-purple-600 to-fuchsia-200 before:bg-violet-500" data-api="imdb">IMDB</span>

            <span class="jikan from-pink-500 to-orange-500 before:bg-amber-500" data-api="jikan">Jikan</span>
        </div>

        <div class="boxes mt-8 flex">

            <div class="tmdb flex-1" data-api="tmdb">

                <div class="info mb-5 flex gap-1 bg-slate-700 text-sm p-2 rounded-md items-start lg:text-base">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="mt-[1px] size-5 shrink-0 text-amber-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>

                    <p>
                        Go to <a href="https://www.themoviedb.org/" target="_blank">themoviedb.org</a> search a post and
                        copy the url of the post, then paste in the URL box.
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="mt-[2px] size-5 text-amber-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <p>
                        Supported: Movie, Tv, Anime
                    </p>
                </div>

                <div class="field flex flex-col gap-2">
                    <span class="">TMDB URL:</span>

                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="input animatedRing bg-gray-900 w-full flex items-center rounded-md pr-1">

                            <input type="text" class="flex-1 bg-transparent  rounded-md" placeholder="Paste URL Here">

                            <div class="clear hidden p-1 bg-gray-600 rounded-full">
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>

                        <div class="actions">
                            <button type="button"
                                class="import flex gap-2 items-center bg-gradient-to-r from-indigo-500 to-emerald-500 px-4 py-2 rounded-lg text-gray-200"
                                data-api="tmdb">

                                <svg class="loader" x="0px" y="0px" viewBox="0 0 37 37" height="37" width="37"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path class="track" fill="none" stroke-width="5" pathLength="100"
                                        d="M0.37 18.5 C0.37 5.772 5.772 0.37 18.5 0.37 S36.63 5.772 36.63 18.5 S31.228 36.63 18.5 36.63 S0.37 31.228 0.37 18.5">
                                    </path>
                                    <path class="car" fill="none" stroke-width="5" pathLength="100"
                                        d="M0.37 18.5 C0.37 5.772 5.772 0.37 18.5 0.37 S36.63 5.772 36.63 18.5 S31.228 36.63 18.5 36.63 S0.37 31.228 0.37 18.5">
                                    </path>
                                </svg>

                                Import
                            </button>
                        </div>
                    </div>

                </div>

            </div>

            <div class="imdb flex-1 hidden" data-api="imdb">

                <div class="info mb-5 flex gap-1 bg-slate-700 text-sm p-2 rounded-md items-start lg:text-base">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="mt-[1px] size-5 shrink-0 text-amber-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>

                    <p>
                        Go to <a href="https://imdb.com/" target="_blank">imdb.com</a> search a post and
                        copy the url of the post, then paste in the URL box.
                    </p>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="mt-[2px] size-5 text-amber-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <p>
                        Supported: Movie, Tv, Anime
                    </p>
                </div>

                <div class="field flex flex-col gap-2">
                    <span class="">IMDB URL:</span>

                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="input animatedRing bg-gray-900 w-full flex items-center rounded-md pr-1">
                            <input type="text" class="flex-1 bg-transparent  rounded-md" placeholder="Paste URL Here">

                            <div class="clear hidden p-1 bg-gray-600 rounded-full">
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>

                        <div class="actions">
                            <button type="button"
                                class="import flex gap-2 items-center bg-gradient-to-r from-purple-600 to-fuchsia-200  px-4 py-2 rounded-lg text-gray-200"
                                data-api="imdb">

                                <svg class="loader" x="0px" y="0px" viewBox="0 0 37 37" height="37" width="37"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path class="track" fill="none" stroke-width="5" pathLength="100"
                                        d="M0.37 18.5 C0.37 5.772 5.772 0.37 18.5 0.37 S36.63 5.772 36.63 18.5 S31.228 36.63 18.5 36.63 S0.37 31.228 0.37 18.5">
                                    </path>
                                    <path class="car" fill="none" stroke-width="5" pathLength="100"
                                        d="M0.37 18.5 C0.37 5.772 5.772 0.37 18.5 0.37 S36.63 5.772 36.63 18.5 S31.228 36.63 18.5 36.63 S0.37 31.228 0.37 18.5">
                                    </path>
                                </svg>

                                Import
                            </button>
                        </div>
                    </div>

                </div>

            </div>

            <div class="jikan flex-1 hidden" data-api="jikan">
                <div class="info mb-5 bg-slate-700 text-sm p-2 rounded-md items-start lg:text-base">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="mt-[1px] size-5 text-amber-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <p>
                        Go to <a href="https://myanimelist.net/" target="_blank">myanimelist.net</a> search and open a
                        post,
                        copy the url of the post, then paste in the URL box.
                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="mt-[2px] size-5 text-amber-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <p>
                        Supported: Anime Only
                    </p>

                </div>

                <div class="field flex flex-col gap-2">
                    <span class="">MyAnimeList URL or ID:</span>

                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="input animatedRing bg-gray-900 w-full flex items-center rounded-md pr-1">
                            <input type="text" class="flex-1 bg-transparent rounded-md"
                                placeholder="ID or Paste URL Here">

                            <div class="clear hidden p-1 bg-gray-600 rounded-full">
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>

                        <div class="actions">
                            <button type="button"
                                class="import flex gap-2 items-center bg-gradient-to-r from-pink-500 to-orange-500  px-4 py-2 rounded-lg text-gray-200"
                                data-api="jikan">

                                <svg class="loader" x="0px" y="0px" viewBox="0 0 37 37" height="37" width="37"
                                    preserveAspectRatio="xMidYMid meet">
                                    <path class="track" fill="none" stroke-width="5" pathLength="100"
                                        d="M0.37 18.5 C0.37 5.772 5.772 0.37 18.5 0.37 S36.63 5.772 36.63 18.5 S31.228 36.63 18.5 36.63 S0.37 31.228 0.37 18.5">
                                    </path>
                                    <path class="car" fill="none" stroke-width="5" pathLength="100"
                                        d="M0.37 18.5 C0.37 5.772 5.772 0.37 18.5 0.37 S36.63 5.772 36.63 18.5 S31.228 36.63 18.5 36.63 S0.37 31.228 0.37 18.5">
                                    </path>
                                </svg>

                                Import
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <hr class="border-gray-700 my-5">

    <div class="relative form mt-10 tmdb max-w-[1200px] mx-auto">
        <form id="mainForm" action="{{ route('post.edit.handle') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="part flex flex-wrap gap-4 text-white mb-10">
                <h1 class="mb-5 mx-auto w-full sm:text-center text-lg lg:text-xl relative -left-2 ">POST ID (API)</h1>

                <div class="flex flex-col gap-2">
                    <span class="label font-semibold text-md">TMDB ID</span>
                    <input type="text" name="tmdb_id" id="tmdb_id" placeholder="Tmdb ID"
                        value="{{ $post->tmdb_id }}">
                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden"
                        id="tmdb_id_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>Error Text Here</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label font-semibold text-md">IMDB ID</span>
                    <input type="text" name="imdb_id" id="imdb_id" placeholder="Imdb ID"
                        value="{{ $post->imdb_id }}">
                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden"
                        id="imdb_id_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>Error Text Here</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label font-semibold text-md">MAL ID</span>
                    <input type="text" name="mal_id" id="mal_id" placeholder="MyAnimeList ID"
                        value="{{ $post->mal_id }}">
                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden"
                        id="mal_id_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>Error Text Here</span>
                    </div>
                </div>
            </div>

            <div class="part text-white flex flex-wrap gap-4 mb-10">
                <h1 class="mb-1 mx-auto sm:text-center text-lg lg:text-xl relative -left-2 w-full">Infomation</h1>

                <div class="flex fullWidth w-full items-center gap-8">
                    <span class="label required font-semibold text-md">Publish</span>
                    <label class="flex items-center gap-2 text-lg cursor-pointer">
                        <input class="!text-indigo-500" type="radio" name="publish" value="1"
                            {{ $post->publish ? 'checked' : null }}>
                        Yes
                    </label>
                    <label class="flex items-center gap-2 text-lg cursor-pointer">
                        <input class="!text-rose-500" type="radio" name="publish" value="0"
                            {{ !$post->publish ? 'checked' : null }}>
                        No
                    </label>
                </div>

                <div class="flex fullWidth w-full flex-col gap-2">
                    <span class="label required font-semibold text-md">Title</span>
                    <input type="text" name="title" id="title" placeholder="Post Title"
                        value="{{ $post->title }}">
                    <div class="error h-0 flex items-center gap-1 text-red-500 text-sm font-semibold overflow-hidden"
                        id="title_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>


                <div class="flex fullWidth w-full flex-col gap-2">
                    <div class="flex items-center gap-5">
                        <span class="label font-semibold text-md mr-20">Slug</span>

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="slug_type" value="auto">
                            <span>Auto</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer ">
                            <input type="radio" class="text-rose-400" name="slug_type" value="custom" checked>
                            <span>Custom</span>
                        </label>

                    </div>

                    <input type="text" name="slug" id="slug"
                        placeholder="e.g. demon-slayer-kimesu-no-yaiba-season-3" value="{{ $post->slug }}">
                </div>


                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Type</span>

                    <select style="width:100%" class="type select2" name="type">
                        <option value="movie" {{ $post->type == 'movie' ? 'selected' : null }}>Movie</option>
                        <option value="tv" {{ $post->type == 'tv' ? 'selected' : null }}>TV</option>
                    </select>

                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden" id="type_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Is Anime</span>

                    <select style="width:100%" class="isAnime select2" name="isAnime">
                        <option value="0" {{ !$post->is_anime ? 'selected' : null }}>No</option>
                        <option value="1" {{ $post->is_anime ? 'selected' : null }}>Yes</option>
                    </select>

                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden"
                        id="is_anime_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>


                <div class="flex fullWidth w-full flex-col gap-2 ">
                    <span class="label required font-semibold text-md">Synopsis</span>
                    <textarea name="synopsis" id="synopsis" cols="30" rows="10" placeholder="Post Synopsis">{{ $post->synopsis }}</textarea>
                    <div class="error h-0 flex items-center gap-1 text-red-500 text-sm font-semibold overflow-hidden"
                        id="synopsis_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Rating Type</span>

                    <select style="width:100%" class="ratingType select2" name="ratingType">
                        <option value="imdb" {{ $post->rating_type == 'imdb' ? 'selected' : null }}>Imdb</option>
                        <option value="tmdb" {{ $post->rating_type == 'tmdb' ? 'selected' : null }}>Tmdb</option>
                        <option value="mal" {{ $post->rating_type == 'mal' ? 'selected' : null }}>MyAnimeList</option>
                    </select>

                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden"
                        id="rating_type_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Rating</span>
                    <input type="number" step="0.01" min="0" max="10" name="rating" id="rating"
                        placeholder="Post Rating" value="{{ $post->rating }}">
                    <div class="error h-0 flex items-center gap-1 text-red-500 text-sm font-semibold overflow-hidden"
                        id="rating_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Release Date</span>
                    <input type="text" name="releaseDate" id="releaseDate" placeholder="--Choose Date--"
                        value="{{ $post->release_date }}">

                    <div class="info w-full text-sm pl-2">
                        <span>Format:</span>
                        <span class="text-amber-400">Year-Month-Date</span>
                    </div>

                    <div class="error h-0 flex items-center gap-1 text-red-500 text-sm font-semibold overflow-hidden"
                        id="release_date_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Location</span>
                    <input type="text" name="location" id="location" placeholder="Location e.g. Japan"
                        autocomplete="off" value="{{ $post->location }}">
                    <div class="error h-0 flex items-center gap-1 text-red-500 text-sm font-semibold overflow-hidden"
                        id="location_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

            </div>

            <div class="part text-white flex flex-wrap gap-4 mb-10">
                <h1 class="mb-1 mx-auto w-full sm:text-center text-lg lg:text-xl relative -left-2">Extra</h1>

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Genre</span>

                    <select style="width:100%" class="genre select2" multiple="multiple" name="genre[]">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @if (in_array($genre->id, $genreIds)) selected @endif>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden" id="genre_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Category</span>

                    <select style="width:100%" class="category select2" multiple="multiple" name="category[]">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (in_array($category->id, $categoryIds)) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="error h-0 flex items-center gap-1 text-sm font-semibold overflow-hidden"
                        id="category_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>
            </div>

            <div class="part text-white flex flex-col gap-4 mb-10">
                <h1 class="mb-1 mx-auto w-fit sm:mx-0 text-lg lg:text-xl relative -left-2">Poster & Backdrop</h1>

                @php
                    $posterJson = json_decode($post->posters);
                    $posterType = $posterJson->type;
                    $posterImg = $posterJson->img;
                @endphp

                <div class="flex flex-col gap-2">
                    <span class="label required font-semibold text-md">Poster Type</span>
                    <select style="width:100%" name="poster_type" id="poster_type" class="poster_type select2">
                        <option value="url" {{ $posterType == 'url' ? 'selected' : null }}>URL</option>
                        <option value="custom" {{ $posterType == 'custom' ? 'selected' : null }}>Custom</option>
                    </select>
                    <div class="error h-0 flex items-center gap-1 text-red-500 text-sm font-semibold overflow-hidden"
                        id="title_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div id="poster_upload_url"
                    class="{{ $posterType == 'url' ? 'flex' : 'hidden' }} flex-col gap-4 px-4 lg:px-8 lg:gap-8 md:flex-row ">

                    <div class="flex flex-1 gap-2 flex-col items-center">
                        <div class="flex flex-col relative gap-2 w-full">
                            <span class="label required sm:mx-0 !text-base lg:!text-lg">Default</span>
                            <input class="w-full" type="url" name="default_poster_url" id="default_poster_url"
                                autocomplete="off" placeholder="Poster URL - Large - Width:500px"
                                @if ($posterType == 'url' && isset($posterImg->default)) value='{{ $posterImg->default }}' @endif>

                        </div>
                        <div class="img aspect-[2/3] w-[150px] bg-slate-700 relative">
                            <span class="placeholder-text absoluteCenter text-2xl">2 : 3</span>
                            <img src="" id="default_poster" class="hidden absoluteCenter w-full h-full"
                                alt="Image Not Found">
                        </div>
                    </div>

                    <div class="flex flex-1 gap-2 flex-col items-center">
                        <div class="flex flex-col relative gap-2 w-full">
                            <span class="label sm:mx-0 !text-base lg:!text-lg">Large</span>
                            <input class="w-full" type="url" name="large_poster_url" id="large_poster_url"
                                autocomplete="off" placeholder="Poster URL - Medium - Width:500px"
                                @if ($posterType == 'url' && isset($posterImg->large)) value='{{ $posterImg->large }}' @endif>
                        </div>
                        <div class="img aspect-[2/3] w-40 bg-slate-700 relative">
                            <span class="placeholder-text absoluteCenter text-2xl">2 : 3</span>
                            <img src="" id="large_poster" class="hidden absoluteCenter w-full h-full"
                                alt="Image Not Found">
                        </div>
                    </div>

                    <div class="flex flex-1 gap-2 flex-col items-center">
                        <div class="flex flex-col relative gap-2 w-full">
                            <span class="label sm:mx-0 !text-base lg:!text-lg">Small</span>
                            <input class="w-full" type="url" name="small_poster_url" id="small_poster_url"
                                autocomplete="off" placeholder="Poster URL - Small - Width: 150px >" @if ($posterType == 'url' && isset($posterImg->small))
                            value='{{ $posterImg->small }}'
                            @endif
                            >
                        </div>
                        <div class="img aspect-[2/3] w-36 bg-slate-700 relative">
                            <span class="placeholder-text absoluteCenter text-2xl">2 : 3</span>
                            <img src="" id="small_poster" class="hidden absoluteCenter w-full h-full"
                                alt="Image Not Found">
                        </div>
                    </div>

                </div>

                <div id="poster_upload_custom" class="{{ $posterType == 'custom' ? 'flex' : 'hidden' }} px-4">
                    <div
                        class="img mx-auto aspect-[2/3] w-48 bg-slate-700 relative flex flex-col gap-1 justify-center items-center">
                        <span class="text-2xl">2 : 3</span>
                        <button type="button" id="poster_upload_btn"
                            class="px-4 py-2 bg-rose-500 rounded-md lg:text-lg drop-shadow-md z-10">
                            @if ($posterType == 'custom' && isset($posterImg->large))
                                Change
                            @else
                                Upload
                            @endif
                        </button>
                        <input type="file" name="poster_custom" id="poster_custom" accept="image/*" hidden
                            aria-hidden="true">
                        @if ($posterType == 'custom' && isset($posterImg->large))
                            <img id="custom_poster_img" class="absoluteCenter w-full h-full" alt="Image Not Found"
                                src="@if ($posterType == 'custom' && isset($posterImg->large)) {{ '/uploads/posters/' . $posterImg->large }} @endif">
                        @else
                            <img id="custom_poster_img" class="hidden absoluteCenter w-full h-full" alt="Image Not Found"
                                src="">
                        @endif

                    </div>
                </div>


                @php
                    $backdropJson = json_decode($post->backdrops);
                    $backdropType = $backdropJson->type;
                    $backdropImg = $backdropJson->img;
                @endphp

                <div class="flex flex-col gap-2 mt-6">
                    <span class="label required font-semibold text-md">Backdrop Type</span>
                    <select style="width:100%" name="backdrop_type" id="backdrop_type" class="backdrop_type select2">
                        <option value="url" {{ $backdropType == 'url' ? 'selected' : null }}>URL</option>
                        <option value="custom" {{ $backdropType == 'custom' ? 'selected' : null }}>Custom</option>
                    </select>
                    <div class="error h-0 flex items-center gap-1 text-red-500 text-sm font-semibold overflow-hidden"
                        id="title_error">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-6">
                            <g fill="currentColor">
                                <path d="M8 2a6 6 0 1 0 6 6 6 6 0 0 0-6-6Zm0 11a5 5 0 1 1 5-5 5 5 0 0 1-5 5Z"></path>
                                <path
                                    d="M8 6.85a.5.5 0 0 0-.5.5v3.4a.5.5 0 0 0 1 0v-3.4a.5.5 0 0 0-.5-.5zM8 4.8a.53.53 0 0 0-.51.52v.08a.47.47 0 0 0 .51.47.52.52 0 0 0 .5-.5v-.12A.45.45 0 0 0 8 4.8z">
                                </path>
                            </g>
                        </svg>
                        <span>This Field Is required!</span>
                    </div>
                </div>

                <div id="backdrop_upload_url"
                    class="{{ $backdropType == 'url' ? 'flex' : 'hidden' }}  flex-col gap-4 px-4 md:flex-row">

                    <div class="flex flex-1 gap-2 md:gap-4 flex-col items-center">
                        <div class="flex flex-col relative gap-2 w-full">
                            <span class="label required sm:mx-0 !text-base lg:!text-lg">Large</span>
                            <input class="w-full" type="url" name="large_backdrop_url" id="large_backdrop_url"
                                autocomplete="off" placeholder="Backdrop URL - Large - Width:1500px or greater"
                                @if ($backdropType == 'url' && isset($backdropImg->large)) value='{{ $backdropImg->large }}' @endif>
                        </div>
                        <div class="img aspect-[16/9] max-w-[500px] w-[85%] bg-slate-700 relative">
                            <span class="placeholder-text absoluteCenter text-2xl">16 : 9</span>
                            <img src="" id="large_backdrop" class="hidden absoluteCenter w-full h-full"
                                alt="Image Not Found">
                        </div>
                    </div>

                    <div class="flex flex-1 gap-2 md:gap-4 flex-col items-center">
                        <div class="flex flex-col relative gap-2 w-full">
                            <span class="label sm:mx-0 !text-base lg:!text-lg">Small</span>
                            <input class="w-full" type="url" name="small_backdrop_url" id="small_backdrop_url"
                                autocomplete="off" placeholder="Backdrop URL - Small - Width: 500px or greater"
                                @if ($backdropType == 'url' && isset($backdropImg->small)) value='{{ $backdropImg->small }}' @endif>
                        </div>
                        <div class="img aspect-[16/9] max-w-[450px] w-[70%] md:w-[80%] bg-slate-700 relative">
                            <span class="placeholder-text absoluteCenter text-2xl">16 : 9</span>
                            <img src="" id="small_backdrop" class="hidden absoluteCenter w-full h-full"
                                alt="Image Not Found">
                        </div>
                    </div>

                </div>

                <div id="backdrop_upload_custom" class="{{ $backdropType == 'custom' ? 'flex' : 'hidden' }} px-4">
                    <div
                        class="img mx-auto aspect-[16/9] max-w-[500px] w-[85%] bg-slate-700 relative flex flex-col gap-1 justify-center items-center">
                        <span class="text-2xl">16 : 9</span>
                        <button type="button" id="backdrop_upload_btn"
                            class="px-4 py-2 bg-rose-500 rounded-md lg:text-lg drop-shadow-md z-10">
                            @if ($backdropType == 'custom' && isset($backdropImg->large))
                                Change
                            @else
                                Upload
                            @endif
                        </button>
                        <input type="file" name="backdrop_custom" id="backdrop_custom" accept="image/*" hidden
                            aria-hidden="true">

                        @if ($backdropType == 'custom' && isset($backdropImg->large))
                            <img id="custom_backdrop_img" class="absoluteCenter w-full h-full" alt="Image Not Found"
                                src="@if ($backdropType == 'custom' && isset($backdropImg->large)) {{ '/uploads/backdrops/' . $backdropImg->large }} @endif">
                        @else
                            <img id="custom_backdrop_img" class="hidden absoluteCenter w-full h-full" alt="Image Not Found"
                                src="">
                        @endif
                    </div>
                </div>


            </div>


            <div class="submit fixed bottom-1 right-1 sm:right-0 sm:left-0 w-fit mx-auto text-white z-20">
                <button type="submit" class="flex items-center gap-1 px-4 py-2 bg-gradient-to-r rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>

                    <span>Save</span>
                </button>
            </div>

        </form>
    </div>

    <div
        class="dialog_opener hidden fixed bottom-2 right-2 text-white ring-1 ring-white bg-pink-500 cursor-pointer rounded-full p-2 size-12 md:size-16">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
            stroke="currentColor" class="size-full">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
        </svg>
    </div>

    <dialog
        class="modal hidden flex-col w-[95vw] h-[95vh] fixed top-[50%] left-[50%] -translate-x-[50%] -translate-y-[50%] ring-2 rounded-md ring-slate-400 z-[99]">

        <div class="scroller overflow-auto flex-1">
            <div class="form h-fit tmdb p-4">

                <form action="#" method="POST" class="pb-5 relative">
                    @csrf
                    <h1 class="w-fit mx-auto text-white font-bold my-5 text-lg lg:text-xl xl:text-2xl">
                        Select or Change Fields
                    </h1>

                    <label for="select_all_checkboxes"
                        class="z-20 select_all_checkboxes absolute flex items-center gap-2 top-12 right-1 cursor-pointer">
                        <input type="checkbox" name="select_all_checkbox" class="size-6 !rounded-md"
                            id="select_all_checkboxes">
                        <span class="text-white md:text-lg">Select All</span>
                    </label>

                    <div class="part text-white flex flex-wrap gap-4 mb-10">
                        <h1 class="mb-1 mx-auto w-full sm:text-center text-lg lg:text-xl relative -left-2">Infomation</h1>

                        <div class="flex fullWidth w-full flex-col gap-2">

                            <label for="checkbox_title" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_title" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Title</span>
                            </label>

                            <input type="text" name="title" id="title" placeholder="Post Title">
                        </div>

                        <div class="flex flex-col gap-2">

                            <label for="checkbox_type" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_type" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Type</span>
                            </label>

                            <select style="width:100%" class="type select2" name="type" required>
                                <option value="movie">Movie</option>
                                <option value="tv">TV</option>
                            </select>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="checkbox_isAnime" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_isAnime" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Is Anime</span>
                            </label>

                            <select style="width:100%" class="isAnime select2" name="isAnime" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>


                        <div class="flex fullWidth w-full flex-col gap-2">
                            <label for="checkbox_desc" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_desc" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Synopsis</span>
                            </label>
                            <textarea name="synopsis" id="synopsis" cols="30" rows="10" placeholder="Post Synopsis" required></textarea>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="checkbox_ratingType" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_ratingType" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Rating Type</span>
                            </label>

                            <select style="width:100%" class="ratingType select2" name="ratingType" required>
                                <option value="imdb" selected>Imdb</option>
                                <option value="tmdb">Tmdb</option>
                                <option value="mal">MyAnimeList</option>
                            </select>

                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="checkbox_rating" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_rating" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Rating</span>
                            </label>

                            <input type="number" step="0.01" min="0" max="10" name="rating"
                                id="rating" placeholder="Post Rating" required>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="checkbox_Release" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_Release" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Release</span>
                            </label>

                            <input type="text" name="releaseDate" id="releaseDate_modal"
                                placeholder="--Choose Date--" required>

                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="checkbox_loc" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_loc" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Location</span>
                            </label>

                            <input type="text" name="location" id="location" placeholder="Location e.g. Japan"
                                autocomplete="off" required>
                        </div>

                    </div>

                    <div class="part text-white flex flex-wrap gap-4 mb-10">
                        <h1 class="mb-1 mx-auto w-full sm:text-center text-lg lg:text-xl relative -left-2">Extra</h1>

                        <div class="flex flex-col gap-2">
                            <label for="checkbox_genre" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_genre" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Genre</span>
                            </label>

                            <select style="width:100%" class="genre select2" multiple="multiple" name="genre[]"
                                required>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>

                            <div class="genre_not_found hidden gap-2 p-2 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="size-6 text-amber-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m0-10.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.25-8.25-3.286Zm0 13.036h.008v.008H12v-.008Z" />
                                </svg>

                                <span>Genre <span class="not-found text-amber-500">Genre Name(s)</span> not found</span>
                            </div>

                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="checkbox_cat" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_cat" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Category</span>
                            </label>

                            <select style="width:100%" class="category select2" multiple="multiple" name="category[]"
                                required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="part text-white flex flex-col gap-4 mb-10">
                        <h1 class="mb-1 mx-auto w-fit sm:mx-0 text-lg lg:text-xl relative -left-2">Poster & Backdrop</h1>

                        <div class="flex flex-col gap-2">

                            <label for="checkbox_poster" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_poster" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Poster Type</span>
                            </label>

                            <select style="width:100%" name="poster_type" id="poster_type_modal"
                                class="poster_type select2">
                                <option value="url" selected>URL</option>
                                {{-- <option value="custom">Custom</option> --}}
                            </select>
                        </div>

                        <div id="poster_upload_url" class="flex flex-col gap-4 px-4 lg:px-8 lg:gap-8 md:flex-row ">

                            <div class="flex flex-1 gap-2 flex-col items-center">
                                <div class="flex flex-col relative gap-2 w-full">
                                    <label for="checkbox_poster_default"
                                        class="flex w-fit gap-2 items-center cursor-pointer">
                                        <input id="checkbox_poster_default" type="checkbox" class="size-6">
                                        <span class="label required sm:mx-0 !text-base lg:!text-lg">Default</span>
                                    </label>

                                    <input class="w-full" type="url" name="default_poster_url"
                                        id="default_poster_url" autocomplete="off" required
                                        placeholder="Poster URL - Large - Width:500px">
                                </div>
                                <div class="img aspect-[2/3] w-[150px] bg-slate-700 relative">
                                    <span class="placeholder-text absoluteCenter text-2xl">2 : 3</span>
                                    <img src="" id="default_poster" class="hidden absoluteCenter w-full h-full"
                                        alt="Image Not Found">
                                </div>
                            </div>

                            <div class="flex flex-1 gap-2 flex-col items-center">
                                <div class="flex flex-col relative gap-2 w-full">
                                    <label for="checkbox_poster_large"
                                        class="flex w-fit gap-2 items-center cursor-pointer">
                                        <input id="checkbox_poster_large" type="checkbox" class="size-6">
                                        <span class="label sm:mx-0 !text-base lg:!text-lg">Large</span>
                                    </label>
                                    <input class="w-full" type="url" name="large_poster_url" id="large_poster_url"
                                        autocomplete="off" placeholder="Poster URL - Medium - Width:500px">
                                </div>
                                <div class="img aspect-[2/3] w-40 bg-slate-700 relative">
                                    <span class="placeholder-text absoluteCenter text-2xl">2 : 3</span>
                                    <img src="" id="large_poster" class="hidden absoluteCenter w-full h-full"
                                        alt="Image Not Found">
                                </div>
                            </div>

                            <div class="flex flex-1 gap-2 flex-col items-center">
                                <div class="flex flex-col relative gap-2 w-full">
                                    <label for="checkbox_poster_small"
                                        class="flex w-fit gap-2 items-center cursor-pointer">
                                        <input id="checkbox_poster_small" type="checkbox" class="size-6">
                                        <span class="label sm:mx-0 !text-base lg:!text-lg">Small</span>
                                    </label>
                                    <input class="w-full" type="url" name="small_poster_url" id="small_poster_url"
                                        autocomplete="off" placeholder="Poster URL - Small - Width: 150px >">
                                </div>
                                <div class="img aspect-[2/3] w-36 bg-slate-700 relative">
                                    <span class="placeholder-text absoluteCenter text-2xl">2 : 3</span>
                                    <img src="" id="small_poster" class="hidden absoluteCenter w-full h-full"
                                        alt="Image Not Found">
                                </div>
                            </div>

                        </div>

                        <div id="poster_upload_custom" class="hidden px-4">
                            <div
                                class="img mx-auto aspect-[2/3] w-48 bg-slate-700 relative flex flex-col gap-1 justify-center items-center">
                                <span class="text-2xl">2 : 3</span>
                                <button type="button" id="poster_upload_btn"
                                    class="px-4 py-2 bg-rose-500 rounded-md lg:text-lg drop-shadow-md z-10">Upload</button>
                                <input type="file" name="poster_custom" id="poster_custom" accept="image/*" hidden
                                    aria-hidden="true">
                                <img src="" id="custom_poster_img" class="hidden absoluteCenter w-full h-full"
                                    alt="Image Not Found">
                            </div>
                        </div>

                        <div class="flex flex-col gap-2 mt-6">
                            <label for="checkbox_backdrop" class="flex w-fit gap-2 items-center cursor-pointer">
                                <input id="checkbox_backdrop" type="checkbox" class="size-6">
                                <span class="label required font-semibold text-md">Backdrop Type</span>
                            </label>
                            <select style="width:100%" name="backdrop_type" id="backdrop_type_modal"
                                class="backdrop_type select2">
                                <option value="url" selected>URL</option>
                                {{-- <option value="custom">Custom</option> --}}
                            </select>

                        </div>

                        <div id="backdrop_upload_url" class="flex flex-col gap-4 px-4 md:flex-row">

                            <div class="flex flex-1 gap-2 md:gap-4 flex-col items-center">
                                <div class="flex flex-col relative gap-2 w-full">
                                    <label for="checkbox_backdrop_large"
                                        class="flex w-fit gap-2 items-center cursor-pointer">
                                        <input id="checkbox_backdrop_large" type="checkbox" class="size-6">
                                        <span class="label required sm:mx-0 !text-base lg:!text-lg">Large</span>
                                    </label>
                                    <input class="w-full" type="url" name="large_backdrop_url"
                                        id="large_backdrop_url" autocomplete="off" required
                                        placeholder="Backdrop URL - Large - Width:1500px or greater">
                                </div>
                                <div class="img aspect-[16/9] max-w-[500px] w-[85%] bg-slate-700 relative">
                                    <span class="placeholder-text absoluteCenter text-2xl">16 : 9</span>
                                    <img src="" id="large_backdrop" class="hidden absoluteCenter w-full h-full"
                                        alt="Image Not Found">
                                </div>
                            </div>

                            <div class="flex flex-1 gap-2 md:gap-4 flex-col items-center">
                                <div class="flex flex-col relative gap-2 w-full">
                                    <label for="checkbox_backdrop_small"
                                        class="flex w-fit gap-2 items-center cursor-pointer">
                                        <input id="checkbox_backdrop_small" type="checkbox" class="size-6">
                                        <span class="label sm:mx-0 !text-base lg:!text-lg">Small</span>
                                    </label>
                                    <input class="w-full" type="url" name="small_backdrop_url"
                                        id="small_backdrop_url" autocomplete="off"
                                        placeholder="Backdrop URL - Small - Width: 500px or greater">
                                </div>
                                <div class="img aspect-[16/9] max-w-[450px] w-[70%] md:w-[80%] bg-slate-700 relative">
                                    <span class="placeholder-text absoluteCenter text-2xl">16 : 9</span>
                                    <img src="" id="small_backdrop" class="hidden absoluteCenter w-full h-full"
                                        alt="Image Not Found">
                                </div>
                            </div>

                        </div>

                        <div id="backdrop_upload_custom" class="hidden px-4">
                            <div
                                class="img mx-auto aspect-[16/9] max-w-[500px] w-[85%] bg-slate-700 relative flex flex-col gap-1 justify-center items-center">
                                <span class="text-2xl">16 : 9</span>
                                <button type="button" id="backdrop_upload_btn"
                                    class="px-4 py-2 bg-rose-500 rounded-md lg:text-lg drop-shadow-md z-10">Upload</button>
                                <input type="file" name="backdrop_custom" id="backdrop_custom" accept="image/*"
                                    hidden aria-hidden="true">
                                <img src="" id="custom_backdrop_img" class="hidden absoluteCenter w-full h-full"
                                    alt="Image Not Found">
                            </div>
                        </div>


                    </div>

                </form>
            </div>
        </div>

        <div class="actions z-30">
            <div class="fixed top-3 right-3 flex items-center gap-1">
                <div
                    class="minimize text-white cursor-pointer p-2 rounded-md bg-zinc-800  hover:bg-zinc-700 active:bg-zinc-600 active:scale-95 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 md:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                    </svg>

                </div>
                <div
                    class="close text-white cursor-pointer p-2 rounded-md bg-rose-800 hover:bg-rose-700 active:bg-rose-600 active:scale-95 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 md:size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>

            <button type="button" id="modalChangeBtn"
                class="fixed bottom-2 right-2 px-4 py-2 bg-green-500 text-white z-[99] rounded-md md:text-lg ">Confirm</button>
        </div>

    </dialog>

@endsection
