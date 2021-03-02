<x-app-layout>
    <x-slot name="title">{{$title}}</x-slot>
    <x-slot name="header">{{$header}}</x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Playlist</x-th>
            <x-th>Action</x-th>
        </tr>
        @foreach($tags as $tag)
        <tr>
            <x-td>{{$tags->count() * ($tags->currentPage()-1) + $loop->iteration }}</x-td>
            <x-td>{{$tag->name}}</x-td>
            <x-td>{{$tag->playlists_count}}</x-td>
            <x-td>Action</x-td>
        </tr>
        @endforeach
    </x-table>

    {{$tags->links()}}
</x-app-layout>