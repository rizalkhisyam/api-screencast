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
                    <div>
                        {{$item->name}}
                    </div>
                    @foreach($item->tags as $tag)
                    <span class="mr-1 text-xs text-gray-500">{{$tag->name}}</span>
                    @endforeach
                </div>
            </x-td>
            <x-td>{{$item->created_at->format("d F, Y")}}</x-td>
            <x-td>
                <a class="text-blue-500 hover:text-blue-600 font-medium underline uppercase" href="{{route('playlists.edit', $item->slug)}}">Edit</a>
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

                    <button @click="modalIsOpen = true" type="submit" class="focus:outline-none text-red-500 hover:text-red-600 font-medium underline uppercase">
                        Delete
                    </button>
                </div>

            </x-td>
        </tr>
        @endforeach

    </x-table>

    {{$playlists->links()}}
</x-app-layout>