<div class="border bg-white p-4 rounded-lg">
    <div class="flex justify-between">
        <div>
            <h2 class="font-semibold text-xl">{{$post->title}}</h2>
            <p class="opacity-85 text-sm">by {{$post->user->name}}</p>
        </div>
        <div>
            <p class="opacity-60 text-sm">{{$post->created_at}}</p>
        </div>
    </div>
    <div>
        <p class="min-h-20">{{$post->body}}</p>
    </div>
    <div class="flex flex-row items-center gap-4 justify-between">
        <x-voting.voting-sys 
            :isVoted="$hasVoted" 
            :post="$post"
            rating="{{$post->votes}}" 
            />
    </div>
</div>