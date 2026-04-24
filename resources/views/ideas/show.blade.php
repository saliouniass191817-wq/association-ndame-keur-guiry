<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Idee</p>
            <h1 class="headline text-3xl font-bold text-stone-950">{{ $idea->title }}</h1>
        </div>
    </x-slot>

    <div class="surface p-8">
        <div class="flex items-center justify-between gap-4">
            <p class="text-sm text-stone-500">Soumise par {{ $idea->user->full_name }}</p>
            <x-status-badge :status="$idea->status" />
        </div>
        <p class="mt-6 text-base leading-8 text-stone-700">{{ $idea->description }}</p>
    </div>
</x-app-layout>
