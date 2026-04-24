<x-app-layout>
    <div class="grid gap-8 lg:grid-cols-[1.3fr_0.7fr]">
        <section class="surface overflow-hidden p-8 sm:p-10">
            <p class="text-sm uppercase tracking-[0.4em] text-amber-600">Ndame Keur Guiry</p>
            <h1 class="headline mt-4 max-w-3xl text-4xl font-bold leading-tight text-stone-950 sm:text-5xl">
                Une plateforme communautaire pour le sport, la culture et les projets du village.
            </h1>
            <p class="mt-6 max-w-2xl text-base leading-8 text-stone-600">
                Les membres partagent leurs idées, proposent des projets et suivent la vie de l'association dans un espace
                simple, moderne et structure.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('register') }}" class="btn-primary">Rejoindre la communaute</a>
                <a href="{{ route('public.projects.index') }}" class="btn-secondary">Voir les projets</a>
            </div>
        </section>

        <section class="grid gap-4">
            <div class="surface p-6">
                <p class="text-sm text-stone-500">Membres</p>
                <p class="headline mt-2 text-4xl font-bold">{{ $membersCount }}</p>
            </div>
            <div class="surface p-6">
                <p class="text-sm text-stone-500">Idées approuvées</p>
                <p class="headline mt-2 text-4xl font-bold">{{ $approvedIdeasCount }}</p>
            </div>
            <div class="surface p-6">
                <p class="text-sm text-stone-500">Propositions validées</p>
                <p class="headline mt-2 text-4xl font-bold">{{ $approvedProposalsCount }}</p>
            </div>
        </section>
    </div>

    <div class="mt-10 grid gap-6 lg:grid-cols-3">
        <section class="surface p-6">
            <h2 class="headline text-2xl font-bold">Projets</h2>
            <div class="mt-4 space-y-4">
                @forelse ($projects as $project)
                    <a href="{{ route('public.projects.show', $project) }}" class="block rounded-2xl border border-stone-200 p-4 hover:border-amber-400">
                        <div class="flex items-center justify-between gap-3">
                            <h3 class="font-semibold">{{ $project->title }}</h3>
                            <x-status-badge :status="$project->status" />
                        </div>
                        <p class="mt-2 text-sm text-stone-600">{{ Str::limit($project->description, 110) }}</p>
                    </a>
                @empty
                    <p class="text-sm text-stone-500">Aucun projet publié pour le moment.</p>
                @endforelse
            </div>
        </section>

        <section class="surface p-6">
            <h2 class="headline text-2xl font-bold">Actualités</h2>
            <div class="mt-4 space-y-4">
                @forelse ($posts as $post)
                    <a href="{{ route('public.news.show', $post) }}" class="block rounded-2xl border border-stone-200 p-4 hover:border-amber-400">
                        <h3 class="font-semibold">{{ $post->title }}</h3>
                        <p class="mt-2 text-sm text-stone-600">{{ Str::limit(strip_tags($post->content), 110) }}</p>
                    </a>
                @empty
                    <p class="text-sm text-stone-500">Aucune actualité pour le moment.</p>
                @endforelse
            </div>
        </section>

        <section class="surface p-6">
            <h2 class="headline text-2xl font-bold">Evénements</h2>
            <div class="mt-4 space-y-4">
                @forelse ($events as $event)
                    <div class="rounded-2xl border border-stone-200 p-4">
                        <h3 class="font-semibold">{{ $event->title }}</h3>
                        <p class="mt-2 text-sm text-stone-600">{{ $event->date->translatedFormat('d M Y') }} a {{ $event->location }}</p>
                    </div>
                @empty
                    <p class="text-sm text-stone-500">Aucun événement programmé.</p>
                @endforelse
            </div>
        </section>
    </div>
</x-app-layout>
