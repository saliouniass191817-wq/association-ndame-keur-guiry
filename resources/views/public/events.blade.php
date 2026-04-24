<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Agenda</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Evenements</h1>
        </div>
    </x-slot>

    <div class="space-y-4">
        @forelse ($events as $event)
            <div class="surface p-6">
                <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="headline text-2xl font-bold">{{ $event->title }}</h2>
                        <p class="mt-2 text-sm text-stone-500">{{ $event->date->translatedFormat('d F Y') }} a {{ $event->location }}</p>
                    </div>
                </div>
                <p class="mt-4 text-sm leading-7 text-stone-600">{{ $event->description }}</p>
            </div>
        @empty
            <div class="surface p-6">
                <p class="text-sm text-stone-500">Aucun evenement annonce.</p>
            </div>
        @endforelse
    </div>
</x-app-layout>
