@csrf

<div class="mb-6">
    <x-label for="name" :value="__('Name')" />
    <x-input id="name" class="block mt-1 w-full" type="name" name="name" :value="old('name') ?? $playlist->name" required autofocus />
    @error('name')
    <div class="text-red-500 mt-2">{{$message}}</div>
    @enderror
</div>

<div class="mb-6">
    <x-label for="price" :value="__('Price')" />
    <x-input id="price" class="block mt-1 w-full" type="price" name="price" :value="old('price') ?? $playlist->price" required />
    @error('price')
    <div class="text-red-500 mt-2">{{$message}}</div>
    @enderror
</div>

<div class="mb-6">
    <x-label for="description" :value="__('Description')" />
    <x-textarea id="description" name="description" required>{{old('description') ?? $playlist->description}}</x-textarea>
    @error('description')
    <div class="text-red-500 mt-2">{{$message}}</div>
    @enderror
</div>

<div class="mb-6">
    <input type="file" name="thumbnail" id="thumbnail">
    @error('thumbnail')
    <div class="text-red-500 mt-2">{{$message}}</div>
    @enderror
</div>

<x-button>
    {{$submit}}
</x-button>