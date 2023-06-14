@props(['name', 'placeholder' => ''])

<x-form.field>
    <x-form.label name="{{$name}}"/>
    <textarea
        name="{{$name}}"
        class="w-full border border-gray-400 text-sm focus:outline-none focus:ring"
        placeholder="{{$placeholder}}"
        required>{{$slot ?? old("$name")}}</textarea>
    <x-form.error name="{{$name}}"/>
</x-form.field>
