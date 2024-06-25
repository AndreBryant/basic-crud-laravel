<div class="border p-4 rounded-xl bg-white">
    
    <div class="flex items-end gap-2">
        <x-card.card-title title="{{$post->title}}" />
        <p class="opacity-85">
            by {{$post->user->name}}
        </p>
        <p class="opacity-60">
            at {{$post->created_at}}
        </p>
    </div>                        
    
    <div class="my-4 max-h-60">
        <p class="line-clamp-4">
            {{$post->body}}
        </p>
    </div>
    
    <div class="flex flex-row justify-between items-center">
        <x-voting.voting-sys 
            :isVoted="$isVoted" 
            :post="$post"
            rating="{{$post->votes}}" 
            />

        <x-button 
            variant="outline" 
            text="View Post" 
            to="{{route('posts.detail', ['post' => $post])}}" 
            />
    </div>
</div>