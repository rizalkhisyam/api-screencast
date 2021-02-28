<x-app-layout>
    <x-slot name="title">
        Create New Playlists
    </x-slot>

    <x-slot name="header">
        Create New Playlists
    </x-slot>

    <form action="{{route('playlists.create')}}" method="POST" enctype="multipart/form-data" novalidate>
        @include('playlists._form-control', [
        'submit' => 'Create'
        ])
    </form>
</x-app-layout>