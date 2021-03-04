<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>

    <x-slot name="header">
        {{$title}}
    </x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>title</x-th>
            <x-th>Action</x-th>
        </tr>

        @foreach($videos as $item)
        <tr>
            <x-td>{{$videos->count() * ($videos->currentPage()-1) + $loop->iteration }}</x-td>
            <x-td>
                {{$item->title}}
            </x-td>
            <x-td>
                <a href="{{route('videos.edit', [$playlist, $item->unique_video_id])}}">Edit</a>
                <div x-data="{modalIsOpen: false}">
                    <x-modal state="modalIsOpen" x-show="modalIsOpen" title="Are you sure want to delete ?">

                        <h4 class="text-lg capitalize">{{$item->title}}</h4>
                        <span class="text-xs text-gray-500 uppercase">Episode : {{$item->episode}} - Runtime : {{$item->runtime}}</span>
                        <div class="flex items-center mt-5">
                            <div>
                                <form class="mr-2" action="{{route('videos.delete', [$playlist->slug, $item->unique_video_id])}}" method="POST">
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

    {{$videos->links()}}
</x-app-layout>