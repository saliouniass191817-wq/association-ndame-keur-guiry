<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Compte</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Mon profil</h1>
        </div>
    </x-slot>

    <div class="space-y-6">
        <div class="surface p-6 sm:p-8">
            <div class="max-w-3xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="surface p-6 sm:p-8">
            <div class="max-w-2xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="surface p-6 sm:p-8">
            <div class="max-w-2xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
