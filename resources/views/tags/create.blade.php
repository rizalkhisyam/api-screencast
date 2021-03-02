<x-app-layout>
    <x-slot name="title">Create new tags</x-slot>
    <x-slot name="header">
        Create new tags
    </x-slot>

    <div>
        <form action="{{route('tags.create')}}" method="POST">
            @include('tags._form-control', [
            'submit' => 'Create'
            ])
        </form>
    </div>
</x-app-layout>