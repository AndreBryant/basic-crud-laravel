<x-app-layout>
    <div class="w-full h-full flex flex-col px-8 pt-8 gap-4 xl:px-80">
        <div>
            <a href="{{route('posts.index')}}">
                <button class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                    back to posts
                </button>
            </a>
        </div>
        <div>
            <h2 class="font-semibold text-xl">Create A Post</h2>
        </div>
        <form action="{{route('posts.post')}}" method="POST">
            @csrf
            @method('post')
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" />
                    @if ($errors->get('title'))
                    <span class="text-red-600">{{$errors->get('title')[0]}}</span>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="Body">Body:</label>
                    <textarea name="body" id="body" class="min-h-60"></textarea>
                    @if ($errors->get('body'))
                    <span class="text-red-600">{{$errors->get('body')[0]}}</span>
                    @endif
                </div>
                <div>
                    <button type="submit" class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                        Create Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>