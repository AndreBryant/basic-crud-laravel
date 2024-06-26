<x-app-layout>
    <x-slot name="header">
        <x-title title="View Post" />
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-6">
        <div>
            <x-button 
                variant="link" 
                text="back to posts" 
                to="{{route('posts.index')}}" 
                />
        </div>
        
        <div>
            <x-card.post-details 
                :post="$post" 
                :hasVoted="$hasVoted"
                />
        </div>
 
        <div>
            <x-card.post-actions 
                :post="$post" 
                />
        </div>
        
        <div>
            <x-card.comment-section 
                :post="$post" 
                :comments="$comments" 
                :edit="$edit ?? false" 
                :editCommentId="$editCommentId ?? null"
                :errors="$errors ?? null"
                />
        </div>

    </div>
</x-app-layout>