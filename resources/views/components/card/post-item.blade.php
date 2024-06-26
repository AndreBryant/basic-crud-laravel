<div class="p-4 rounded-xl bg-white">
    
    <div class="flex justify-between">
        <div class="flex flex-col">
            <x-card.card-title title="{{$post->title}}" />
            @if (Auth::id() == $post->user_id)
                <p class="opacity text-sm">by <span class="font-semibold text-sm bg-slate-200 px-2 rounded-xl">{{$post->user->name}}</span></p>
            @else
                <p class="opacity-85 text-sm">by {{$post->user->name}}</p>
            @endif
        </div>
        <p class="opacity-60 text-sm">
            {{$post->created_at}}
        </p>
    </div>                        
    
    
    <div class="max-h-60 my-6 w-full overflow-hidden">
        <p class="w-full break-words">
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