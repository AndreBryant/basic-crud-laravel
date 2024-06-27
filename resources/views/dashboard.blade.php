<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Your Posts & Comments') }}
            </h2>
            <x-button 
                variant="primary" 
                text="Add a post" 
                to="{{route('posts.create')}}" 
                />
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-4">
        <div class="space-y-2">
            <x-title title="Posts" />
            <div class="flex flex-col gap-4">
                @forelse ($posts as $post)
                    <x-card.post-item
                        :post="$post"
                        :isVoted="in_array($post->id, $userVotes)"
                        />
                    @empty
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                {{ __("You do not have any posts yet.") }}
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
       
        <div class="space-y-2">
            <x-title title="Comments" />
            <div class="flex flex-col gap-2">
                @forelse ($comments as $comment)
                    {{-- TODO: turn this into a component --}}
                    <div class="bg-white py-2 px-4 space-y-4">
                        <h3 class="font-semibold">{{$comment->post->title}}</h3>
                        <p class="break-words line-clamp-3">
                            <span class="px-2 bg-slate-200">{{Auth::user()->name}}</span>
                            : {{$comment->body}}
                        </p>
                        <div>
                            <p class="opacity-60 text-xs">{{$comment->created_at}}</p>
                            <x-button 
                                variant="link" 
                                text="View post" 
                                to="{{route('posts.detail', ['postId' => $comment->post->id])}}" 
                                />
                        </div>
                    </div>
                    @empty
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                {{ __("You do not have any comments.") }}
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-app-layout>
