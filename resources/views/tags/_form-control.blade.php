@csrf

<div class="mb-6 w-1/2">
    <x-label for="name" value="Name" />
    <x-input id="name" name="name" type="text" class="w-full mt-2"></x-input>
</div>

<x-button type="submit">{{$submit}}</x-button>