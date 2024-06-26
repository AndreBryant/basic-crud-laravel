<x-app-layout>
    <div class="w-full h-full flex flex-col px-8 pt-8 gap-4 xl:px-80">
        <div>
            <x-button 
                variant="outline" 
                text="back to posts" 
                to="{{route('posts.index')}}"
            />
        </div>
        
        <div>
            <x-title title="Edit A Post" />
        </div>
        
        <x-forms.post-form 
            action="{{route('posts.update', ['post' => $post])}}" 
            :post="$post"
            method="PUT" 
            submitText="Edit Post" 
            :errors="$errors ?? null" 
            />
    </div>
</x-app-layout>