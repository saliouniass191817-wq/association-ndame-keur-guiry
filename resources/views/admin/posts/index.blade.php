<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h1 class="headline text-3xl font-bold text-stone-950">Gestion des actualites</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn-primary">Nouvel article</a>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-2">
        @foreach ($posts as $post)
            <div class="surface overflow-hidden">
                @if ($post->image)
                    <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="h-48 w-full object-cover" />
                @endif
                <div class="p-6">
                    <h2 class="headline text-2xl font-bold">{{ $post->title }}</h2>
                    <p class="mt-3 text-sm leading-7 text-stone-600">{{ Str::limit(strip_tags($post->content), 160) }}</p>
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('admin.posts.edit', $post) }}" class="btn-secondary">Modifier</a>
                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-secondary">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
