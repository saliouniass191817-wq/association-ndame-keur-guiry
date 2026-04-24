<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Proposition</p>
            <h1 class="headline text-3xl font-bold text-stone-950">{{ $proposal->title }}</h1>
        </div>
    </x-slot>

    <div class="surface p-8">
        <div class="flex items-center justify-between gap-4">
            <p class="text-sm text-stone-500">Soumise par {{ $proposal->user->full_name }}</p>
            <x-status-badge :status="$proposal->status" />
        </div>
        <p class="mt-6 text-base leading-8 text-stone-700">{{ $proposal->description }}</p>
        <div class="mt-6 rounded-3xl bg-stone-100 p-5">
            <h2 class="font-semibold text-stone-950">Impact attendu</h2>
            <p class="mt-3 text-sm leading-7 text-stone-700">{{ $proposal->impact }}</p>
        </div>
    </div>
</x-app-layout>
