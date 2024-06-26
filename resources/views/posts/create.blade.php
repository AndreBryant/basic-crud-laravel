<x-app-layout>
    <x-slot name="header">
        <div>
            <x-title title="Create a Post" />
        </div>
    </x-slot>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 py-6">
        <x-button 
            variant="link" 
            text="back to posts" 
            to="{{route('posts.index')}}" 
        />
        <x-forms.post-form 
            action="{{route('posts.post')}}"
            method="POST"
            submitText="Create Post"
            :errors="$errors ?? null"
            />
    </div>
</x-app-layout>