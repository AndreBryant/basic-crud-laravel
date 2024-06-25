<x-app-layout>
    <div class="w-full h-full flex flex-col px-8 pt-8 gap-4 xl:px-80">
        <div class="flex justify-between">            
            <div>
                <x-title title="Posts" />
            </div>
            {{-- Sonner maybe: --}}
            {{-- @if (session()->has('success'))
                <p>
                    {{session('success')}}
                </p>
            @endif --}}
            <x-button 
                variant="primary" 
                text="Add a post" 
                to="{{route('posts.create')}}" 
            />
        </div>
        <div class="flex flex-col grow gap-4">
            @foreach ($posts as $post)
                <div class="border p-4 rounded-xl bg-white group">
                    <div class="flex justify-between items-center">
                        <div class="flex items-end gap-2">
                            <x-title title="{{$post->title}}" />
                            
                            <p class="opacity-85">
                                by {{$post->user->name}}
                            </p>
                            
                            <p class="opacity-60">
                                at {{$post->created_at}}
                            </p>
                        </div>
                        
                        @if (Auth::id() == $post->user_id)
                            <div 
                                class="flex flex-row gap-4 group-hover:opacity-100 opacity-0 transition-opacity"
                            >
                                <x-button 
                                    variant="outline" 
                                    text="Edit Post" 
                                    to="{{route('posts.edit',['post' => $post])}}"
                                />
                                
                                <form action="{{route('posts.destroy', ['post' => $post])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    
                                    <x-button 
                                        variant="destructive" 
                                        type="submit" 
                                        text="Delete Post" 
                                        to=""
                                    />
                                </form>
                            </div>
                        @endif
                    </div>
                    
                    <div class="my-4 max-h-60">
                        <p class="line-clamp-4">
                            {{$post->body}}
                        </p>
                    </div>
                    
                    <div class="flex flex-row justify-between items-center">
                        <div class="flex flex-row gap-4 items-center">
                            @if (in_array($post->id, $userVotes))
                                <form 
                                    action="{{route('posts.unvote', ['post' => $post])}}" 
                                    method="post"
                                >   
                                    @csrf
                                    @method('put')
                                    <x-button 
                                        variant="outline" 
                                        text="unvote" 
                                        type="submit" 
                                        to="" 
                                    />  
                                </form>
                            @else
                                <form 
                                    action="{{route('posts.vote', ['post' => $post])}}" 
                                    method="post"
                                >
                                    @csrf
                                    @method('put')
                                    <x-button 
                                        variant="outline" 
                                        text="vote" 
                                        to="" 
                                        type="submit" 
                                    />
                                </form>
                            @endif
                            <span class="opacity-85 text-sm">
                                Rating: {{$post->votes}}
                            </span>
                        </div>

                        <x-button 
                            variant="outline" 
                            text="View Post" 
                            to="{{route('posts.detail', ['post' => $post])}}" 
                            />
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <p class="text-center opacity-80">
                BASIC CRUD
            </p>
        </div>
    </div>
</x-app-layout>