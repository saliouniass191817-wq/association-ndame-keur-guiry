<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Administration</p>
                <h1 class="headline text-3xl font-bold text-stone-950">Gestion des projets</h1>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="btn-primary">Nouveau projet</a>
        </div>
    </x-slot>

    <div class="space-y-4">
        @foreach ($projects as $project)
            <div class="surface p-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                    <div>
                        <div class="flex items-center gap-3">
                            <h2 class="headline text-2xl font-bold">{{ $project->title }}</h2>
                            <x-status-badge :status="$project->status" />
                        </div>
                        <p class="mt-3 text-sm leading-7 text-stone-600">{{ Str::limit($project->description, 200) }}</p>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn-secondary">Modifier</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
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
