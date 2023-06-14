@if(session()->has('success'))
    <div x-data="{show:true}"
         x-init="setTimeout(()=> show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white text-sm bottom-3 right-3 py-2 px-4 rounded-xl">
        <p>
            {{session('success')}}
        </p>
    </div>
@endif
