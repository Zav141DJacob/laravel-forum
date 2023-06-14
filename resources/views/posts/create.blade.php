<x-settings heading="Publish new post">
    <form method="POST" action="/admin/posts" class="mt-10" enctype="multipart/form-data">
        @csrf
        <x-form.input name="title" required/>
        <x-form.input name="slug" required/>
        <x-form.input name="thumbnail" type="file" required/>
        <x-form.textarea name="excerpt" type="textarea"></x-form.textarea>
        <x-form.textarea name="body" type="textarea"></x-form.textarea>
        <x-form.field>
            <x-form.label name="category"/>
            <select class="border border-gray-400 p-2 w-full"
                    name="category_id"
                    id="category_id"
                    value="{{old('category_id')}}">
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{$category->id}}"
                        {{old('category_id') == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach
            </select>
            <x-form.error name="category"/>
        </x-form.field>
        <x-form.button>Publish</x-form.button>
    </form>
</x-settings>
