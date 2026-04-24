<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Administration</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Pilotage de la plateforme</h1>
        </div>
    </x-slot>

    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($stats as $label => $value)
            <div class="surface p-6">
                <p class="text-sm text-stone-500">{{ str_replace('_', ' ', $label) }}</p>
                <p class="headline mt-2 text-4xl font-bold">{{ $value }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-2">
        <div class="surface p-6">
            <h2 class="headline text-2xl font-bold">Dernières idées</h2>
            <div class="mt-4 space-y-4">
                @foreach ($latestIdeas as $idea)
                    <div class="rounded-2xl border border-stone-200 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <p class="font-semibold">{{ $idea->title }}</p>
                            <x-status-badge :status="$idea->status" />
                        </div>
                        <p class="mt-2 text-sm text-stone-500">{{ $idea->user->full_name }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="surface p-6">
            <h2 class="headline text-2xl font-bold">Dernières propositions</h2>
            <div class="mt-4 space-y-4">
                @foreach ($latestProposals as $proposal)
                    <div class="rounded-2xl border border-stone-200 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <p class="font-semibold">{{ $proposal->title }}</p>
                            <x-status-badge :status="$proposal->status" />
                        </div>
                        <p class="mt-2 text-sm text-stone-500">{{ $proposal->user->full_name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
