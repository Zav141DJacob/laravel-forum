@props(['name', 'showError' => true])

<x-form.field>
    <x-form.label name="{{$name}}"/>
    <input class="border border-gray-300 p-2 w-full"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}>
    @if($showError)
        <x-form.error name="{{$name}}"/>
    @endif
</x-form.field>
