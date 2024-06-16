<table class="!table-fixed text-neutral-100 bg-gray-800 border border-gray-700 rounded-lg overflow-hidden shadow-lg">
    <thead class="bg-gray-700">
        <tr>
            <th class="p-4 text-left">
                <input type="checkbox" name="select_all" id="select_all_post" class="rounded size-5 cursor-pointer">
            </th>
            <th class="p-4 text-left">ID</th>
            <th class="p-4 text-left">Poster</th>
            <th class="p-4 text-left">Title</th>
            <th class="p-4 text-left">Slug</th>
            <th class="p-4 text-left">Published</th>
            <th class="p-4 text-left">Created At</th>
            <th class="p-4 text-left">Last Modified</th>
            <th class="p-4 text-left">View</th>
            <th class="p-4 text-left">Edit</th>
            <th class="p-4 text-left">Delete</th>
        </tr>
    </thead>

    <tbody>


        @if ($posts->isEmpty())
            <tr >
                <td colspan="11" class="text-white sm:text-center p-4 mx-auto">
                    No Post Found
                </td>
            </tr>
        @else
            @foreach ($posts as $post)
                <tr class="border-t border-gray-700">
                    <td class="p-4 text-left">
                        <input type="checkbox" name="checkbox_post_{{ $post->id }}"
                            class="rounded size-5 cursor-pointer">
                        <input type="text" name="{{ $post->slug }}" hidden>
                    </td>
                    <td class="p-4 text-left">{{ $post->id }}</td>
                    <td class="p-4 text-left min-w-36 max-w-48 aspect-[2/3]">
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
                        <img src="{{ $poster }}" alt="">
                    </td>
                    <td class="p-4 text-left">{{ $post->title }}</td>
                    <td class="p-4 text-left">{{ $post->slug }}</td>
                    <td class="p-4 text-left">{{ $published }}</td>
                    <td class="p-4 text-left">{{ $post->created_at }}</td>
                    <td class="p-4 text-left">{{ $post->updated_at }}</td>
                    <td class="p-4 text-left">
                        <a href="{{ route('post', $post->slug) }}" target="_blank"
                            class="view bg-slate-500 hover:bg-slate-400 transition-colors rounded-md flex items-center justify-center size-10 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 m-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </td>
                    <td class="p-4 text-left">
                        <a href="{{ route('post.edit.withSlug', $post->slug) }}"
                            class="edit bg-indigo-500 hover:bg-indigo-400 transition-colors text-white size-10 rounded-md flex item-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 m-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </a>
                    </td>
                    <td class="p-4 text-left">
                        <div data-slug="{{ $post->slug }}"
                            class="delete bg-rose-500 hover:bg-rose-400 transition-colors text-white size-10 rounded-md flex item-center justify-center cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 m-auto pointer-events-none">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif

    </tbody>
</table>

<div class="custom_pagination">
    {{ $posts->links() }}
</div>
