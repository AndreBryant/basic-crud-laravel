<x-app-layout>
    <x-slot name="header">
        <x-title title="Edit A Post" />
    </x-slot>
            
        
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-6">
        <x-button 
                variant="link" 
                text="back to posts" 
                to="{{route('posts.index')}}"
            />
        <x-forms.post-form 
            action="{{route('posts.update', ['postId' => $post->id])}}" 
            :post="$post"
            method="PUT" 
            submitText="Edit Post" 
            :errors="$errors ?? null" 
            />
    </div>
</x-app-layout>