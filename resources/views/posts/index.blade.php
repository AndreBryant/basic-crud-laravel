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