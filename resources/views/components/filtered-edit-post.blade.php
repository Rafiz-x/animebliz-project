<div class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-7 2xl:grid-cols-8  3xl:grid-cols-9 gap-3 mt-6 px-3 pb-5">
    @if ($posts->isEmpty())
        <h1 class="text-white">No Post Found</h1>
    @endif
    @foreach ($posts as $post)
        <a href="{{ route('post.edit.withSlug', $post->slug) }}"
            class="relative aspect-[2/3] w-full hover:scale-110 bg-slate-900 rounded-sm hover:rounded-none overflow-hidden transition-all shadow-sm shadow-slate-600 active:scale-95 group">
            {{-- w-32 sm:w-36 lg:w-40 xl:w-44 --}}
            <div class="edit_icon flex gap-1 px-3 py-1.5 items-center rounded-md bg-blue-600 absoluteCenter z-10 text-white opacity-0 group-hover:opacity-100 transition-all">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                  </svg>
                  <span>Edit</span>                  
            </div>
            @php
                $posterImg = json_decode($post->posters);

                if ($posterImg->type == 'url') {
                    $poster = $posterImg->img->default;
                } elseif ($posterImg->type == 'custom') {
                    $poster = '/uploads/posters/' . $posterImg->img->default;
                } else {
                    $poster = '';
                }

                $published = $post->publish ? 'Yes' : 'No';
            @endphp
            <img src="{{ $poster }}" alt="{{ $post->title }}" class="w-full h-full">
            <div class="title absolute bottom-0 left-[50%] -translate-x-[50%] w-full text-center p-2 line-clamp-2 bg-slate-800 bg-opacity-60">
                <span class="text-white text-sm">{{ $post->title }}</span>
            </div>
        </a>
    @endforeach
</div>

<div class="pagination">
    {{ $posts->links() }}
</div>