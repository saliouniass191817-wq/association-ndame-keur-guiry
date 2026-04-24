<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Communauté</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Membres de l'association</h1>
        </div>
    </x-slot>

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($members as $member)
            <div class="surface p-6">
                <div class="flex items-center gap-4">
                    @if ($member->profile_photo)
                        <img src="{{ Storage::url($member->profile_photo) }}" alt="{{ $member->full_name }}" class="h-14 w-14 rounded-2xl object-cover" />
                    @else
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-stone-200 font-bold text-stone-600">
                            {{ strtoupper(substr($member->first_name, 0, 1).substr($member->last_name, 0, 1)) }}
                        </div>
                    @endif
                    <div>
                        <h2 class="font-semibold text-stone-950">{{ $member->full_name }}</h2>
                        <p class="text-sm text-stone-500">{{ $member->civility ? $member->civility.' - ' : '' }}{{ $member->role }}</p>
                    </div>
                </div>
                <div class="mt-4 space-y-1 text-sm text-stone-500">
                    @if ($member->profession)
                        <p>Profession : {{ $member->profession }}</p>
                    @endif
                    @if ($member->age)
                        <p>Age : {{ $member->age }} ans</p>
                    @endif
                    @if ($member->sex)
                        <p>Sexe : {{ ucfirst($member->sex) }}</p>
                    @endif
                </div>
                <p class="mt-4 text-sm leading-7 text-stone-600">{{ $member->bio ?: 'Aucune bio disponible.' }}</p>
            </div>
        @endforeach
    </div>
</x-app-layout>
