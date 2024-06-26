<x-app-layout>
    <div class="w-full h-full flex flex-col px-8 pt-8 gap-2 xl:px-80">
        <div>
            <x-button 
                variant="outline" 
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