<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Information</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Actualités</h1>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-2">
        @forelse ($posts as $post)
            <a href="{{ route('public.news.show', $post) }}" class="surface block overflow-hidden hover:border-amber-400">
                @if ($post->image)
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="h-56 w-full object-cover" />
                @endif
                <div class="p-6">
                    <h2 class="headline text-2xl font-bold">{{ $post->title }}</h2>
                    <p class="mt-4 text-sm leading-7 text-stone-600">{{ Str::limit(strip_tags($post->content), 180) }}</p>
                </div>
            </a>
        @empty
            <div class="surface p-6">
                <p class="text-sm text-stone-500">Aucune actualité publiée pour le moment.</p>
            </div>
        @endforelse
    </div>
</x-app-layout>
