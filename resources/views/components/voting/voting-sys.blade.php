<div class="flex flex-row gap-4 items-center">
    @if ($isVoted)
        <form 
            action="{{ route('posts.unvote', ['post' => $post]) }}" 
            method="post"
        >   
            @csrf
            @method('put')
            <x-button 
                variant="outline" 
                text="Unvote" 
                type="submit" 
            />  
        </form>
    @else
        <form 
            action="{{ route('posts.vote', ['post' => $post]) }}" 
            method="post"
        >
            @csrf
            @method('put')
            <x-button 
                variant="outline" 
                text="Vote" 
                type="submit" 
            />
        </form>
    @endif
    <span class="opacity-85 text-sm">
        Rating: {{ $rating }}
    </span>
</div>
