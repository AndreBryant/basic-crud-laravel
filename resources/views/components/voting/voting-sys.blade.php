<div class="flex flex-row gap-4 items-center">
    @if ($isVoted)
        <form 
            action="{{ route('posts.unvote', ['post' => $post]) }}" 
            method="post"
            id="unvote-{{$post->id}}"
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
            id="vote-{{$post->id}}"
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
    
    <script type="text/javascript">
        $(document).ready(function()
            {
                $('#unvote-{{$post->id}}').on('submit', function(event)
                    {   
                        event.preventDefault();
                        $.ajax({
                            url: "{{ route('posts.unvote', ['post' => $post]) }}",
                            data:jQuery('#unvote-{{$post->id}}').serialize(),
                            type: 'POST',
                            success: function(result)
                            {
                                // console.log(JSON.stringify(result));
                            },

                        });
                    });

                $('#vote-{{$post->id}}').on('submit', function(event)
                    {
                        event.preventDefault();
                        $.ajax({
                            url: "{{ route('posts.vote', ['post' => $post]) }}",
                            data:jQuery('#vote-{{$post->id}}').serialize(),
                            type: 'POST',
                            success: function(result)
                            {
                                // console.log(JSON.stringify(result));
                            },

                        });
                    });
            });
    </script>
</div>



