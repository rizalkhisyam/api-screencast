<x-app-layout>
    <x-slot name="title">
        Your Playlists
    </x-slot>

    <x-slot name="header">
        Your Playlists
    </x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Published</x-th>
            <x-th>Action</x-th>
        </tr>

        @foreach($playlists as $item)
        <tr>
            <x-td>{{$playlists->count() * ($playlists->currentPage()-1) + $loop->iteration }}</x-td>
            <x-td>
                <div>
                    <a class="block text-blue-500 hover:text-blue-600 hover:underline" href="{{route('videos.table', $item->slug)}}">
                        {{$item->name}}
                    </a>
                    @foreach($item->tags as $tag)
                    <span class="mr-1 text-xs text-gray-500">{{$tag->name}}</span>
                    @endforeach
                </div>
            </x-td>
            <x-td>{{$item->created_at->format("d F, Y")}}</x-td>
            <x-td>
                <a class="text-gray-500 hover:text-gray-600 font-thin underline" href="{{route('videos.create', $item->slug)}}">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg> Add video
                </a>

                <a class="text-blue-500 hover:text-blue-600 font-thin underline " href="{{route('playlists.edit', $item->slug)}}">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit playlist
                </a>
                <div x-data="{modalIsOpen: false}">
                    <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Delete the playlist">
                        Are you sure want to delete:
                        {{$item->name}}
                        <div class="flex items-center mt-5">
                            <div>
                                <form class="mr-2" action="{{route('playlists.delete', $item->slug)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-button @click="modalIsOpen = true" type="submit">
                                        Yes
                                    </x-button>
                                </form>
                            </div>
                            <div>
                                <x-button @click="modalIsOpen = false" type="button">
                                    No
                                </x-button>
                            </div>
                        </div>
                    </x-modal>

                    <button @click="modalIsOpen = true" type="submit" class="focus:outline-none text-red-500 hover:text-red-600 font-thin underline">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg> Delete Playlist
                    </button>
                </div>

            </x-td>
        </tr>
        @endforeach

    </x-table>

    {{$playlists->links()}}
</x-app-layout>