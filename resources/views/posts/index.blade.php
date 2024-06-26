<x-app-layout>
    <x-slot name="header">
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
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-12">
        
        <div class="flex flex-col grow gap-4">
            @foreach ($posts as $post)
                <x-card.post-item
                    :post="$post"
                    :isVoted="in_array($post->id, $userVotes)"
                    />
            @endforeach
        </div>

        <div>
            <p class="text-center opacity-80">
                BASIC CRUD
            </p>
        </div>
    </div>
</x-app-layout>