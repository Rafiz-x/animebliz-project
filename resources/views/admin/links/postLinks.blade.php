@php
    $namespace = 'post_links';
@endphp

@extends('admin.layout')

@section('title', 'Manage Post Link(s)')

@section('name', 'admin.links.withSlug')

@section('content')
    <div class="post_links h-fit mx-auto w-fit sm:w-[90vw] md:w-[80vw] lg:w-[70vw] pb-10 flex flex-col gap-3 bg-gray-800">

        @php
            $backdropImg = json_decode($post->backdrops);

            if ($backdropImg->type == 'url') {
                $backdropLG = $backdropImg->img->large;
                $backdropSM = $backdropImg->img->small ?? null;
            } elseif ($backdropImg->type == 'custom') {
                $backdropLG = '/uploads/backdrops/' . $backdropImg->img->large;
                $backdropSM = '/uploads/backdrops/' . ($backdropImg->img->small ?? '');
            }
        @endphp

        <div class="backdrop relative aspect-video w-full sm:rounded-md overflow-hidden">
            <div class="overlay z-10 absoluteCenter w-[101%] h-[101%]"
                style='background:linear-gradient(0deg, rgb(31, 41, 55) 1%, transparent 99%);'>

            </div>
            <picture class="w-full h-full">
                @isset($backdropSM)
                    <source media="(max-width:1280px)" srcset="{{ $backdropSM }}">
                @endisset
                <img class="w-full h-full" src="{{ $backdropLG }}">
            </picture>
            <div
                class="info absolute bottom-0 left-0 px-[5%] py-1 text-white textShadow flex flex-col z-20
            xs:gap-1 sm:gap-1.5 md:gap-2 lg:gap-3 xl:gap-4">
                <span class="title font-extrabold text-xl md:text-2xl lg:text-3xl">{{ $post->title }}</span>
                <span
                    class="type text-neutral-300 font-semibold text-lg  md:text-xl lg:text-2xl">{{ $post->type == 'tv' ? 'TV' : 'MOVIE' }}</span>
            </div>
        </div>

        <hr class="border-zinc-600 mx-auto w-[90%]">

        <div
            class="actions mt-1 px-[5%] flex justify-between bg-gray-800 py-2 gap-5 items-center sticky top-0 right-0 z-20">
            <button data-action="links"
                class="active text-white hover:text-neutral-300 text-base lg:text-lg xl:text-xl">Links</button>

            <button id="submitBtn"
                class="flex items-center w-fit gap-2 rounded-md text-white px-2.5 py-1.5 sm:px-4 sm:py-2 sm:text-lg bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                </svg>
                Save
            </button>
        </div>

        <div class="action_results px-[5%] my-2 sm:my-4">
            <div class="links_area" data-action="links">
                <div class="links_not_found {{ $links->isEmpty() ? 'flex' : 'hidden' }} items-center gap-3">
                    <span class="text-zinc-400 text-lg lg:text-xl">No Links found!</span>

                    <button
                        class="add_link bg-pink-500 hover:bg-pink-600 active:bg-pink-700 active:sm:scale-95 rounded-md text-white px-2 py-1 sm:px-4 sm:py-2 inline-flex items-center gap-1 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>Add Link</button>
                </div>

                <div class="links flex flex-col gap-10">
                    <form action="{{ route('admin.links.handlePostLinks') }}" method="POST" class="flex flex-col gap-14">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                        @foreach ($links as $link)
                            <div class="link flex gap-5">
                                <div class="info hidden sm:block">
                                    <span class="text-amber-500 font-mono text-lg lg:text-xl">{{ $loop->iteration }}</span>
                                </div>
                                <div class="grid w-full flex-1 grid-cols-1 sm:grid-cols-2 gap-2">

                                    <div class="info mx-auto w-full flex items-center justify-between sm:hidden">
                                        <span class="text-amber-500 font-mono text-lg lg:text-xl">No.
                                            {{ $loop->iteration }}</span>

                                        <div class="actions flex sm:hidden gap-4">
                                            <div class="moves flex gap-2 sm:flex-row">
                                                <div class="up p-2 text-white w-fit h-fit rounded-full bg-slate-500 hover:bg-slate-600 active:bg-slate-700 cursor-pointer transition-colors"
                                                    title="Move This Link Up">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-0width="1.5" stroke="currentColor"
                                                        class="size-6 pointer-events-none">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                                                    </svg>
                                                </div>
                                                <div class="down p-2 text-white w-fit h-fit rounded-full bg-slate-500 hover:bg-slate-600 active:bg-slate-700 cursor-pointer transition-colors"
                                                    title="Move This Link Down">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6 pointer-events-none">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div
                                                class="delete p-2 text-white w-fit h-fit rounded-full bg-rose-500 hover:bg-rose-600 active:bg-rose-700 cursor-pointer transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="size-6 pointer-events-none">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="field sm:col-span-2 w-full flex flex-col gap-1.5 text-neutral-300">
                                        <label for="link_name_{{ $loop->iteration }}"
                                            class="required text-slate-200">Name</label>
                                        <input type="text" name="link_name[]" id="link_name_{{ $loop->iteration }}"
                                            value="{{ $link->name }}" placeholder="Link Name"
                                            class="bg-slate-900 text-white ring-1 focus:!ring-2 focus:!ring-neutral-400 ring-neutral-400 rounded-md">
                                    </div>
                                    <div class="field w-full flex flex-col gap-1.5 text-neutral-300">
                                        <label for="link_url_{{ $loop->iteration }}"
                                            class="required text-slate-200">URL</label>
                                        <input type="text" name="link_url[]" id="link_url_{{ $loop->iteration }}"
                                            value="{{ $link->url }}" placeholder="Link URL"
                                            class="bg-slate-900 text-white ring-1 focus:!ring-2 focus:!ring-neutral-400 ring-neutral-400 rounded-md">
                                    </div>
                                    <div class="field w-full flex flex-col gap-1.5 text-neutral-300">
                                        <label for="link_type_{{ $loop->iteration }}" class="text-slate-200">Type</label>
                                        <select name="link_type[]" id="link_type_{{ $loop->iteration }}"
                                            class="bg-slate-900 text-white ring-1 focus:!ring-2 focus:!ring-neutral-400 ring-neutral-400 rounded-md">
                                            @php
                                                $linkTypes = [
                                                    'Unknown' => 'Default : Unknown',
                                                    'Direct' => 'Direct',
                                                    'GDrive' => 'GDrive',
                                                    'Mega' => 'Mega',
                                                    '1Drive' => '1Drive',
                                                    'GDflix' => 'GDflix',
                                                    'Other' => 'Other',
                                                ];

                                                // Check if the link type is one of the array keys, otherwise default to 'Unknown'
                                                $selectedType = array_key_exists($link->type, $linkTypes)
                                                    ? $link->type
                                                    : 'Unknown';
                                            @endphp

                                            @foreach ($linkTypes as $value => $label)
                                                <option value="{{ $value }}"
                                                    {{ $link->type == $value ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="field w-full flex flex-col gap-1.5 text-neutral-300">
                                        <label for="link_lang_{{ $loop->iteration }}"
                                            class="text-slate-200">Language</label>
                                        <input type="text" name="link_lang[]" id="link_lang_{{ $loop->iteration }}"
                                            value="{{ $link->language }}" placeholder="Default : Unknown"
                                            class="bg-slate-900 text-white ring-1 focus:!ring-2 focus:!ring-neutral-400 ring-neutral-400 rounded-md">
                                    </div>
                                    <div class="field w-full flex flex-col gap-1.5 text-neutral-300">
                                        <label for="link_quality_{{ $loop->iteration }}"
                                            class="text-slate-200">Quality</label>
                                        <input type="text" name="link_quality[]" value="{{ $link->quality }}"
                                            id="link_quality_{{ $loop->iteration }}" placeholder="Default : Unknown"
                                            class="bg-slate-900 text-white ring-1 focus:!ring-2 focus:!ring-neutral-400 ring-neutral-400 rounded-md">
                                    </div>
                                </div>
                                <div class="actions hidden sm:flex flex-col gap-4 mt-8 sm:mt-6">
                                    <div class="moves flex gap-2 flex-col sm:flex-row">
                                        <div class="up p-2 text-white w-fit h-fit rounded-full bg-slate-500 hover:bg-slate-600 active:bg-slate-700 cursor-pointer transition-colors"
                                            title="Move This Link Up">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-6 pointer-events-none">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />
                                            </svg>
                                        </div>
                                        <div class="down p-2 text-white w-fit h-fit rounded-full bg-slate-500 hover:bg-slate-600 active:bg-slate-700 cursor-pointer transition-colors"
                                            title="Move This Link Down">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="size-6 pointer-events-none">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="delete p-2 text-white w-fit h-fit rounded-full bg-rose-500 hover:bg-rose-600 active:bg-rose-700 cursor-pointer transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 pointer-events-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </form>

                    <button
                        class="add_link {{ $links->isEmpty() ? 'hidden' : 'inline-flex' }} w-fit mx-auto bg-pink-500 hover:bg-pink-600 active:bg-pink-700 active:sm:scale-95 rounded-md text-white px-2 py-1 sm:px-4 sm:py-2 items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>Add Link</button>
                </div>

            </div>
        </div>

    </div>
@endsection
