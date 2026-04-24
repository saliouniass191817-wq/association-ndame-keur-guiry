<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 lg:flex-row lg:items-end lg:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Espace membre</p>
                <h1 class="headline text-3xl font-bold text-stone-950">Bonjour {{ auth()->user()->full_name }}</h1>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('ideas.index') }}" class="btn-secondary">Mes idées</a>
                <a href="{{ route('project-proposals.index') }}" class="btn-primary">Mes propositions</a>
            </div>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="surface p-6 lg:col-span-2">
            <h2 class="headline text-2xl font-bold">Participer à la vie de l'association</h2>
            <p class="mt-3 text-sm leading-7 text-stone-600">
                Soumettez des idées, proposez des projets et suivez les retours de l'administration pour faire avancer
                Ndame Keur Guiry ensemble.
            </p>

            <div class="mt-6 grid gap-4 sm:grid-cols-2">
                <a href="{{ route('ideas.index') }}" class="rounded-3xl border border-stone-200 p-5 hover:border-amber-400">
                    <h3 class="font-semibold text-stone-950">Boîte à idées</h3>
                    <p class="mt-2 text-sm text-stone-600">Envoyer une suggestion et suivre son statut.</p>
                </a>
                <a href="{{ route('project-proposals.index') }}" class="rounded-3xl border border-stone-200 p-5 hover:border-amber-400">
                    <h3 class="font-semibold text-stone-950">Propositions de projets</h3>
                    <p class="mt-2 text-sm text-stone-600">Partager une initiative avec son impact attendu.</p>
                </a>
            </div>
        </div>

        <div class="surface p-6">
            <h2 class="headline text-xl font-bold">Raccourcis</h2>
            <div class="mt-4 space-y-3 text-sm">
                <a href="{{ route('profile.edit') }}" class="block rounded-2xl border border-stone-200 px-4 py-3 hover:border-stone-400">Modifier mon profil</a>
                <a href="{{ route('public.projects.index') }}" class="block rounded-2xl border border-stone-200 px-4 py-3 hover:border-stone-400">Voir les projets</a>
                <a href="{{ route('public.news.index') }}" class="block rounded-2xl border border-stone-200 px-4 py-3 hover:border-stone-400">Lire les actualités</a>
                <a href="{{ route('public.events.index') }}" class="block rounded-2xl border border-stone-200 px-4 py-3 hover:border-stone-400">Consulter les événements</a>
                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="block rounded-2xl border border-amber-300 bg-amber-50 px-4 py-3 hover:border-amber-400">Acceder au panel admin</a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
