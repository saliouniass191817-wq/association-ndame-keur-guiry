<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h1 class="headline text-3xl font-bold text-stone-950">Gestion des evenements</h1>
            <a href="{{ route('admin.events.create') }}" class="btn-primary">Nouvel evenement</a>
        </div>
    </x-slot>

    <div class="space-y-4">
        @foreach ($events as $event)
            <div class="surface p-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="headline text-2xl font-bold">{{ $event->title }}</h2>
                        <p class="mt-2 text-sm text-stone-500">{{ $event->date->translatedFormat('d F Y') }} a {{ $event->location }}</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn-secondary">Modifier</a>
                        <form method="POST" action="{{ route('admin.events.destroy', $event) }}">
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
