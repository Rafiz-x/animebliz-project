@php
    $namespace = 'links_select_post';
@endphp

@extends('admin.layout')

@section('title', 'Select a Post to add Link(s)')

@section('name', 'admin.links.select')

@section('content')
<div class="links_select_post mx-auto w-fit max-w-full overflow-hidden">

    <div class="search_filter my-2 flex flex-col sm:flex-row justify-start gap-2 sm:gap-5 items-center">
        <div class="filter mx-2 flex items-center gap-2 text-white">
            <span class="bg-slate-700 px-5 py-2.5 rounded-md">Sort By</span>
            <select name="filter" id="filter">
                <option value="created_at_desc">Newest</option>
                <option value="created_at_asc">Oldest</option>

                <option value="my_creations">My Creations</option>

                <option value="published">Published</option>
                <option value="not_published">Not Published</option>

                <option value="title_asc">Title: (A-Z)</option>
                <option value="title_desc">Title: (Z-A)</option>

                {{-- <option value="slug_asc">Slug: (A-Z)</option>
                <option value="slug_desc">Slug: (Z-A)</option> --}}

                <option value="updated_at_desc">Modified: Newest</option>
                <option value="updated_at_asc">Modified: Oldest</option>
            </select>
        </div>
        <div
            class="search w-full xs:w-[80%] sm:max-w-72 flex items-center justify-center gap-2 px-2 bg-slate-700 rounded-md placeholder:text-neutral-50">

            <div class="search_icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#fff" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>

            <input type="text" placeholder="Search Post by Name" id="post_search" name="post_search"
                class="flex-1 w-full caret-rose-500 !text-white bg-transparent" autocomplete="off">

        </div>
    </div>

    <div class="posts_to_select my-5">
            <x-link-post-select :posts="$posts" />
    </div>

</div>

@endsection
