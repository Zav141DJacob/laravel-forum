<x-settings heading="Edit Post: {{$post->title}}">
    <form method="POST" action="/admin/posts/{{$post->id}}" class="mt-10" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-form.input name="title" :value="old('title', $post->title)" required/>
        <x-form.input name="slug" :value="old('title', $post->slug)" required/>

        <div class="flex mt-6">
            <div class="flex-1">
                <x-form.input name="thumbnail" type="file" :value="old('title', $post->title)"/>
            </div>
            <img src="{{asset('storage/' . $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl ml-6" width="100">
        </div>
        <x-form.textarea name="excerpt" type="textarea">{{old('excerpt', $post->excerpt)}}</x-form.textarea>
        <x-form.textarea name="body" type="textarea">{{old('body', $post->body)}}</x-form.textarea>
        <x-form.field>
            <x-form.label name="category"/>
            <select class="border border-gray-400 p-2 w-full"
                    name="category_id"
                    id="category_id"
                    value="{{old('category_id', $post->category_id)}}">
                @foreach(\App\Models\Category::all() as $category)
                    <option value="{{$category->id}}"
                        {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>{{ucwords($category->name)}}</option>
                @endforeach
            </select>
            <x-form.error name="category"/>
        </x-form.field>
        <x-form.button>Update</x-form.button>
    </form>
</x-settings>
