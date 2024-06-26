<div class="flex flex-row gap-4 items-center">
    <form 
        action="{{ $isVoted ? route('posts.unvote', ['post' => $post]) : route('posts.vote', ['post' => $post]) }}" 
        method="post"
        id="vote-form-{{$post->id}}"
    >   
        @csrf
        @method('put')
        <x-button 
            variant="secondary" 
            text="{{ $isVoted ? 'Unvote' : 'Vote' }}" 
            type="submit" 
            id="form-button-{{$post->id}}"
        />  
    </form>

    <span class="opacity-85 text-sm" id="rating-{{$post->id}}">
        Rating: {{ $rating }}
    </span>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#vote-form-{{$post->id}}').on('submit', function(event) {   
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    type: 'POST',
                    success: function(result) {
                        if(result.success) {
                            let form = $('#vote-form-{{$post->id}}');
                            let button = $('#form-button-{{$post->id}}');
                            if (result.isVoted) {
                                form.attr('action', "{{ route('posts.unvote', ['post' => $post]) }}");
                                button.text('Unvote');
                            } else {
                                form.attr('action', "{{ route('posts.vote', ['post' => $post]) }}");
                                button.text('Vote');
                            }
                            $('#rating-{{$post->id}}').text('Rating: ' + result.rating);
                        }
                    },
                });
            });
        });
    </script>
</div>
