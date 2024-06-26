<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Your Posts') }}
            </h2>
            <x-button 
                variant="primary" 
                text="Add a post" 
                to="{{route('posts.create')}}" 
                />
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
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
</x-app-layout>
