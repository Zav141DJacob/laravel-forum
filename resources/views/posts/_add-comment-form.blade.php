@auth()

    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments">
            @csrf

            <header class="flex items-center">
                <img  src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="60" height="60" class="rounded-full">
                <h2 class="ml-4">
                    Want to participate?

                </h2>
            </header>
            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full border border-gray-400 text-sm focus:outline-none focus:ring"
                    rows="5"
                    placeholder="AAAAAAAAAAAAAAAA"
                    required></textarea>
                <x-form.error name="body"/>
            </div>

            <div class="flex justify-end">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a class="font-semibold hover:underline" href="/register">Register</a> or <a class="font-semibold hover:underline" href="/login">Login</a>  to leave a comment
    </p>
@endauth
