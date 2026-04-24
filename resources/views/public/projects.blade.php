<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Public</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Projets approuvés et en cours</h1>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-2">
        @forelse ($projects as $project)
            <a href="{{ route('public.projects.show', $project) }}" class="surface block p-6 hover:border-amber-400">
                <div class="flex items-center justify-between gap-4">
                    <h2 class="headline text-2xl font-bold">{{ $project->title }}</h2>
                    <x-status-badge :status="$project->status" />
                </div>
                <p class="mt-4 text-sm leading-7 text-stone-600">{{ Str::limit($project->description, 180) }}</p>
            </a>
        @empty
            <div class="surface p-6">
                <p class="text-sm text-stone-500">Aucun projet disponible.</p>
            </div>
        @endforelse
    </div>
</x-app-layout>
