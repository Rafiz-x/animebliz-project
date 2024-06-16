@php
    $namespace = 'category_all';
@endphp

@extends('admin.layout')

@section('title', 'All Category(s)')

@section('name', 'admin.category.all')

@section('content')

    <div class="all_category mx-auto w-fit max-w-full overflow-hidden">

        <div class="search_filter my-2 flex flex-col sm:flex-row justify-start gap-2 sm:gap-5 items-center">
            <div class="filter mx-2 flex items-center gap-2 text-white">
                <span class="bg-slate-700 px-5 py-2.5 rounded-md">Sort By</span>
                <select name="filter" id="filter">
                    <option value="id_asc">ID ASC</option>
                    <option value="id_desc">ID DESC</option>

                    <option value="name_asc">Name ASC</option>
                    <option value="name_desc">Name DESC</option>

                    <option value="slug_asc">Slug ASC</option>
                    <option value="slug_desc">Slug DESC</option>


                    <option value="created_at_asc">Created At ASC</option>
                    <option value="created_at_desc">Created At DESC</option>

                    <option value="updated_at_asc">Modified ASC</option>
                    <option value="updated_at_desc">Modified DESC</option>
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

                <input type="text" placeholder="Search Category by Name" id="category_search" name="category_search"
                    class="flex-1 w-full caret-rose-500 !text-white bg-transparent" autocomplete="off">

            </div>
        </div>

        <div class="overflow-x-auto w-full customScrollbar">
            <div class="table w-fit">
                

                    <x-filtered-category :categories="$categories" />
                    {{-- Table and other Tag is close is this component --}}
                    {{-- END .table  --}}
                    {{-- End .customScrollbar  --}}

            </div>
        </div>

        <div class="fixed checkBoxDelete p-4 rounded-md text-white bg-slate-700 -bottom-20 left-[50%] -translate-x-[50%] flex items-center gap-3">
            <span class="cursor-default">Delete Selected</span>
            <div class="deleteSelected bg-rose-500 hover:bg-rose-400 transition-colors text-white size-10 rounded-md flex item-center justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 m-auto pointer-events-none">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </div>
        </div>
    </div>




@endsection
