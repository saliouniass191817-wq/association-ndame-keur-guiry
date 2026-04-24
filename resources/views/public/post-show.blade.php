<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Actualité</p>
            <h1 class="headline text-3xl font-bold text-stone-950">{{ $post->title }}</h1>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <article class="surface overflow-hidden">
            @if ($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="h-72 w-full object-cover" />
            @endif
            <div class="p-8">
                <div class="prose max-w-none prose-stone">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </article>

        <div class="space-y-6">
            <div class="surface p-6">
                <h2 class="headline text-2xl font-bold">Réagir</h2>
                <div class="mt-4">
                    <x-comment-form :action="route('posts.comments.store', $post)" />
                </div>
            </div>
            <div class="surface p-6">
                <x-comment-list :comments="$post->comments" />
            </div>
        </div>
    </div>
</x-app-layout>
