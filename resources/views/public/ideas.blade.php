<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Inspirations</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Idées approuvées</h1>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-2">
        @forelse ($ideas as $idea)
            <div class="surface p-6">
                <div class="flex items-center justify-between gap-4">
                    <h2 class="headline text-2xl font-bold">{{ $idea->title }}</h2>
                    <x-status-badge :status="$idea->status" />
                </div>
                <p class="mt-2 text-sm text-stone-500">Proposée par {{ $idea->user->full_name }}</p>
                <p class="mt-4 text-sm leading-7 text-stone-600">{{ $idea->description }}</p>
            </div>
        @empty
            <div class="surface p-6">
                <p class="text-sm text-stone-500">Aucune idée approuvée pour le moment.</p>
            </div>
        @endforelse
    </div>
</x-app-layout>
