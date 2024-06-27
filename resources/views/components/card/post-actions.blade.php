<div class="p-4 bg-white flex flex-row justify-between items-end">
    <div class="flex flex-col gap-4">
        
        <x-card.card-title title="Comments" />

        <div>
            <form action="{{route('posts.comment', ['postId' => $post->id])}}" method="post">
                @csrf
                @method('post')
                <div class="flex gap-4">
                    <input type="text" name="body" id="body" class="w-96 h-8"/>
                    <x-button 
                        variant="outline"
                        text="Add Comment"
                        type="submit"
                        />
                </div>
            </form>
        </div>

    </div>
   
    @if (Auth::id() == $post->user_id)
        <div class="flex flex-row gap-4">
            <x-button 
                variant="outline" 
                text="Edit Post" 
                to="{{route('posts.edit',['postId' => $post->id])}}" 
                />

            <form action="{{route('posts.destroy', ['postId' => $post->id])}}" method="post">
                @csrf
                @method('delete')
                <x-button 
                    variant="destructive"
                    text="Delete Post"
                    type="submit"
                    />
            </form>
        </div>
    @endif
</div>