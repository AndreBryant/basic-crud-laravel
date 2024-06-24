<x-app-layout>
    <div class="w-full h-full flex flex-col px-8 pt-8 gap-4 xl:px-80">
        <div class="flex justify-between">            
            <div>
                <h2 class="font-semibold text-2xl">Posts</h2>
            </div>
            {{-- Sonner maybe: --}}
            {{-- @if (session()->has('success'))
                <p>
                    {{session('success')}}
                </p>
            @endif --}}
            <div>
                <a href="{{route('posts.create')}}">
                    <button class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">Add a post</button>
                </a>
            </div>
        </div>
        <div class="flex flex-col grow gap-4">
            @foreach ($posts as $post)
                <div class="border p-4 rounded-xl bg-white group">
                    <div class="flex justify-between items-center">
                        <div class="flex items-end gap-2">
                            <h2 class="font-semibold text-xl">
                                {{$post->title}}
                            </h2>
                            <p class="opacity-85">by {{$post->user->name}}</p>
                            <p class="opacity-60">at {{$post->created_at}}</p>
                        </div>
                        @if (Auth::id() == $post->user_id)
                            <div class="flex flex-row gap-4 group-hover:opacity-100 opacity-0 transition-opacity">
                                <a href="{{route('posts.edit',['post' => $post])}}">
                                    <button class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">Edit post</button>
                                </a>
                            
                                <form action="{{route('posts.destroy', ['post' => $post])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border text-gray-100 bg-red-600 px-4 py-1 rounded-md hover:bg-red-800">
                                        Delete Post
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="my-4 max-h-60">
                        <p class="line-clamp-4"> {{$post->body}}</p>
                    </div>
                    
                    <div class="flex flex-row justify-between items-center">
                        <div class="flex flex-row gap-4 items-center">
                            @if (in_array($post->id, $userVotes))
                                <form action="{{route('posts.unvote', ['post' => $post])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                                        unvote
                                    </button>
                                </form>
                            @else
                                <form action="{{route('posts.vote', ['post' => $post])}}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                                        vote
                                    </button>
                                </form>
                            @endif
                            <span class="opacity-85 text-sm">Rating: {{$post->votes}}</span>
                        </div>

                        <a href="{{route('posts.detail', ['post' => $post])}}">
                            <button class="border bg-white px-4 py-1 rounded-md hover:bg-gray-100">
                                View Post
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <p class="text-center opacity-80">BASIC CRUD</p>
        </div>
    </div>
</x-app-layout>