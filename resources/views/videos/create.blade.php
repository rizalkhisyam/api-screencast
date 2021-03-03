<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>

    <x-slot name="header">
        {{$header}}
    </x-slot>

    <form action="{{route('videos.create', $playlist->slug)}}" method="POST" novalidate>
        @include('videos._form-control', [
        'submit' => 'Create'
        ])
    </form>


</x-app-layout>