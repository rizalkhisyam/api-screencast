<x-app-layout>
    <x-slot name="title">
        {{$title}}
    </x-slot>

    <x-slot name="header">
        {{$header}}
    </x-slot>


    <form action="{{route('tags.edit', $tag->slug)}}" method="POST" enctype="multipart/form-data" novalidate>
        @method('put')
        @include('tags._form-control', [
        'submit' => 'Update'
        ])
    </form>
</x-app-layout>