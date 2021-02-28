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
            <x-td>{{$item->name}}</x-td>
            <x-td>{{$item->created_at->format("d F, Y")}}</x-td>
            <x-td>
                <a class="text-blue-500 hover:text-blue-600 font-medium underline uppercase" href="{{route('playlists.edit', $item->slug)}}">Edit</a>
            </x-td>
        </tr>
        @endforeach

    </x-table>

    {{$playlists->links()}}
</x-app-layout>