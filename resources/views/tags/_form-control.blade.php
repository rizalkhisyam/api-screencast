@csrf

<div class="mb-6 w-1/2">
    <x-label for="name" value="Name" />
    <x-input id="name" name="name" type="text" class="w-full mt-2" :value="old('name') ?? $tag->name"></x-input>
</div>

@error('name')
<div class="text-red-500 mb-2">
    {{$message}}
</div>
@enderror

<x-button type="submit">{{$submit}}</x-button>