<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <div class="flex flex-col gap-4">
        
        <div class="flex flex-col">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $post->title ?? '' }}" />
            @if ($errors && $errors->has('title'))
                <span class="text-red-600">{{ $errors->first('title') }}</span>
            @endif
        </div>
        
        <div class="flex flex-col">
            <label for="body">Body:</label>
            <textarea name="body" id="body" class="min-h-60">{{ $post->body ?? '' }}</textarea>
            @if ($errors && $errors->has('body'))
                <span class="text-red-600">{{ $errors->first('body') }}</span>
            @endif
        </div>
        
        <div>
            <x-button 
                variant="outline" 
                text="Create Post" 
                type="{{ $submitText }}"
            />
        </div>
    </div>
</form>
