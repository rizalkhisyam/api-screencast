<x-app-layout>
    <x-slot name="title">{{$title}}</x-slot>
    <x-slot name="header">{{$header}}</x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Playlist</x-th>
            @can('delete tags')
            <x-th>Action</x-th>
            @endcan
        </tr>
        @foreach($tags as $tag)
        <tr>
            <x-td>{{$tags->count() * ($tags->currentPage()-1) + $loop->iteration }}</x-td>
            <x-td>{{$tag->name}}</x-td>
            <x-td>{{$tag->playlists_count}}</x-td>
            @can('delete tags')
            <x-td>
                <div class="flex items-center">
                    <a class="mr-2 text-blue-500 hover:text-blue-600 font-medium underline uppercase" href="{{route('tags.edit', $tag->slug)}}">Edit</a>

                    <div x-data="{modalIsOpen: false}">
                        <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Delete the playlist">
                            Are you sure want to delete:
                            {{$tag->name}}
                            <div class="flex items-center mt-5">
                                <div>
                                    <form class="mr-2" action="{{route('tags.delete', $tag->slug)}}" method="POST">
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

                        <button @click="modalIsOpen = true" type="submit" class="focus:outline-none text-red-500 hover:text-red-600 font-medium underline uppercase">
                            Delete
                        </button>
                    </div>

            </x-td>
            @endcan
        </tr>
        @endforeach
    </x-table>

    {{$tags->links()}}
</x-app-layout>