<div class="border bg-white p-4 rounded-lg">
    <div class="flex justify-between">
        <div>
            <h2 class="font-semibold text-xl">{{$post->title}}</h2>
            @if (Auth::id() == $post->user_id)
                <p class="opacity text-sm">by <span class="text-sm bg-slate-200 px-2 rounded-xl">{{$post->user->name}}</span></p>
            @else
                <p class="opacity-85 text-sm">by {{$post->user->name}}</p>
            @endif
        </div>
        <div>
            <p class="opacity-60 text-sm">{{$post->created_at}}</p>
        </div>
    </div>

    <div class="w-full">
        <p class="min-h-20 w-full line-clamp-4 break-words">{{$post->body}}</p>
    </div>

    <div class="flex flex-row items-center gap-4 justify-between">
        <x-voting.voting-sys 
            :isVoted="$hasVoted" 
            :post="$post"
            rating="{{$post->votes}}" 
            />
    </div>
</div>