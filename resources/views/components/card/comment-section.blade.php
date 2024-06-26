<div class="flex flex-col gap-4 p-4 bg-white border rounded-lg">
    @forelse ($comments as $comment)
        <x-card.comment.comment 
            :post="$post" 
            :comment="$comment" 
            :edit="$edit ?? false" 
            :editCommentId="$editCommentId ?? null" 
            :errors="$errors ?? null"
            />
    @empty
        <p>No Comments</p>
    @endforelse
</div>