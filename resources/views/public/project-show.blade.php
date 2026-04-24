<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Projet</p>
                <h1 class="headline text-3xl font-bold text-stone-950">{{ $project->title }}</h1>
            </div>
            <x-status-badge :status="$project->status" />
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
        <div class="surface p-8">
            <p class="text-base leading-8 text-stone-700">{{ $project->description }}</p>
        </div>

        <div class="space-y-6">
            <div class="surface p-6">
                <h2 class="headline text-2xl font-bold">Commentaires</h2>
                <div class="mt-4">
                    <x-comment-form :action="route('projects.comments.store', $project)" />
                </div>
            </div>
            <div class="surface p-6">
                <x-comment-list :comments="$project->comments" />
            </div>
        </div>
    </div>
</x-app-layout>
