<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Participation</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Boite a idees</h1>
        </div>
    </x-slot>

    <div class="grid gap-6 lg:grid-cols-3">
        <div class="surface p-6 lg:col-span-1">
            <h2 class="headline text-2xl font-bold">Nouvelle idee</h2>
            <form method="POST" action="{{ route('ideas.store') }}" class="mt-6 space-y-5">
                @csrf
                <div>
                    <x-input-label for="title" value="Titre" />
                    <input id="title" name="title" type="text" class="field" value="{{ old('title') }}" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" value="Description" />
                    <textarea id="description" name="description" rows="6" class="field" required>{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <button type="submit" class="btn-primary w-full">Soumettre</button>
            </form>
        </div>

        <div class="space-y-6 lg:col-span-2">
            @if (auth()->user()->isAdmin() && $pendingIdeas->isNotEmpty())
                <div class="surface p-6">
                    <h2 class="headline text-2xl font-bold">Idees en attente</h2>
                    <div class="mt-6 space-y-4">
                        @foreach ($pendingIdeas as $idea)
                            <div class="rounded-3xl border border-stone-200 p-5">
                                <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-stone-950">{{ $idea->title }}</h3>
                                        <p class="mt-1 text-sm text-stone-500">Par {{ $idea->user->full_name }}</p>
                                        <p class="mt-3 text-sm leading-7 text-stone-600">{{ $idea->description }}</p>
                                    </div>

                                    <div class="flex gap-2">
                                        <form method="POST" action="{{ route('ideas.status', $idea) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="approuvee" />
                                            <button type="submit" class="btn-primary">Approuver</button>
                                        </form>
                                        <form method="POST" action="{{ route('ideas.status', $idea) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejetee" />
                                            <button type="submit" class="btn-secondary">Rejeter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="surface p-6">
                <h2 class="headline text-2xl font-bold">{{ auth()->user()->isAdmin() ? 'Toutes les idees' : 'Mes idees' }}</h2>
                <div class="mt-6 space-y-4">
                    @forelse ($ideas as $idea)
                        <a href="{{ route('ideas.show', $idea) }}" class="block rounded-3xl border border-stone-200 p-5 hover:border-amber-400">
                            <div class="flex items-center justify-between gap-3">
                                <h3 class="font-semibold text-stone-950">{{ $idea->title }}</h3>
                                <x-status-badge :status="$idea->status" />
                            </div>
                            <p class="mt-3 text-sm leading-7 text-stone-600">{{ Str::limit($idea->description, 180) }}</p>
                        </a>
                    @empty
                        <p class="text-sm text-stone-500">Aucune idee pour le moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
