<form action="{{$to}}" method="post">
    @csrf
    @method('put')
    <div class="flex flex-col gap-4">
        <div>
            <p class="font-semibold">{{$comment->user->name}}</p>
            <div>
                <input type="text" name="body" id="body" class="border-b border-0 p-0" value="{{$comment->body}}"/>
                @if ($errors && $errors->has('body'))
                    <span class="text-red-600">{{ $errors->first('body') }}</span>
                @endif
            </div>
        </div>
        <x-button variant="outline" text="Update Comment" type="submit" />
    </div>
</form>