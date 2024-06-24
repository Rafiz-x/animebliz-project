<div class="results grid sm:px-2 gap-x-2 gap-y-4 md:gap-3 grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7">
    {{-- w-[40vw] xs:w-[30vw] sm:w-[22vw] md:w-[18vw] lg:w-[12.9vw] --}}
    @if ($posts->isEmpty())
        <h1 class="text-white flex items-center justify-center col-span-12 text-xl lg:text-2xl xl:text-2xl h-[10vh]">
            No Post Found</h1>
    @else
        @foreach ($posts as $post)
            <div class="item !bg-transparent">
                <a href="{{ route('admin.links.withSlug', $post->slug) }}" class="content w-full flex flex-col gap-2">
                    <div class="relative w-full aspect-[2/3] shadow-current active:scale-95 transition-all cursor-pointer md:hover:scale-[1.1] rounded-[4px] group">

                        <picture>
                            @php
                                $posterImg = json_decode($post->posters);

                                if ($posterImg->type == 'url') {
                                    $posterDefault = $posterImg->img->default;
                                    $posterLG = $posterImg->img->large ?? null;
                                    $posterSM = $posterImg->img->small ?? null;
                                } elseif ($posterImg->type == 'custom') {
                                    $poster = '/uploads/posters/' . $posterImg->img->default;
                                    $posterLG = '/uploads/posters/' . ($posterImg->img->large ?? '');
                                    $posterSM = '/uploads/posters/' . ($posterImg->img->small ?? '');
                                }
                            @endphp

                            @isset($posterSM)
                                <source media="(max-width: 600px)" srcset="{{ $posterSM }}">
                            @endisset

                            @isset($posterLG)
                                <source media="(min-width: 2500px)" srcset="{{ $posterLG }}">
                            @endisset

                            <img alt="Poster" srcset="{{ $posterDefault }}" class="w-full h-full">
                        </picture>

                        <div
                            class="overlay absoluteCenter w-full h-full bg-[#000] pointer-events-none transition-all opacity-0 group-hover:opacity-60">
                        </div>
                        <div
                            class="info absoluteCenter  text-white font-normal pointer-events-none transition-all opacity-0 group-hover:opacity-100 w-full px-1 mt-10">
                            <div class="w-fit mx-auto flex flex-col">
                                <span class="px-2 py-1 sm:px-4 sm:py-2 bg-gray-600 rounded-md text-sm">Manage Links</span>
                            </div>
                        </div>
                    </div>
                    <div class="details px-1 flex flex-col gap-1">
                        <span
                            class="title break-words font-semibold text-zinc-300 line-clamp-1">{{ $post->title }}</span>

                        <p
                            class="text-zinc-500 line-clamp-3 text-sm  hidden">
                            {{ $post->synopsis }}</p>

                        <div class="flex items-center gap-4">
                            <span class="text-rose-500">{{ $post->type == 'tv' ? 'TV' : 'Movie' }}</span>
                            @php
                                $postDate = new DateTime($post->release_date);
                                $postYear = $postDate->format('Y');
                            @endphp

                            <div class="size-1.5 rounded-full bg-zinc-500"></div>

                            <span class="season text-indigo-500 break-words">{{ $postYear }}</span>
                        </div>
                    </div>
                </a>

            </div>
        @endforeach

    @endif
</div>

<div class="pagination">
    {{{ $posts->links() }}}
</div>
