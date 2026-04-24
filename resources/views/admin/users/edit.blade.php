<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Administration</p>
            <h1 class="headline text-3xl font-bold text-stone-950">Modifier {{ $user->full_name }}</h1>
        </div>
    </x-slot>

    <div class="surface p-8">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <x-input-label for="first_name" value="Prenom" />
                    <input id="first_name" name="first_name" type="text" class="field" value="{{ old('first_name', $user->first_name) }}" required />
                </div>
                <div>
                    <x-input-label for="second_name" value="Deuxieme prenom" />
                    <input id="second_name" name="second_name" type="text" class="field" value="{{ old('second_name', $user->second_name) }}" />
                </div>
            </div>

            <div>
                <x-input-label for="last_name" value="Nom" />
                <input id="last_name" name="last_name" type="text" class="field" value="{{ old('last_name', $user->last_name) }}" required />
            </div>

            <div class="grid gap-5 sm:grid-cols-4">
                <div>
                    <x-input-label for="civility" value="Civilite" />
                    <select id="civility" name="civility" class="field">
                        <option value="">Choisir</option>
                        <option value="M." @selected(old('civility', $user->civility) === 'M.')>M.</option>
                        <option value="Mme" @selected(old('civility', $user->civility) === 'Mme')>Mme</option>
                        <option value="Mlle" @selected(old('civility', $user->civility) === 'Mlle')>Mlle</option>
                    </select>
                </div>

                <div>
                    <x-input-label for="sex" value="Sexe" />
                    <select id="sex" name="sex" class="field">
                        <option value="">Choisir</option>
                        <option value="homme" @selected(old('sex', $user->sex) === 'homme')>Homme</option>
                        <option value="femme" @selected(old('sex', $user->sex) === 'femme')>Femme</option>
                        <option value="autre" @selected(old('sex', $user->sex) === 'autre')>Autre</option>
                    </select>
                </div>

                <div>
                    <x-input-label for="profession" value="Profession" />
                    <input id="profession" name="profession" type="text" class="field" value="{{ old('profession', $user->profession) }}" />
                </div>

                <div>
                    <x-input-label for="age" value="Age" />
                    <input id="age" name="age" type="number" min="1" max="120" class="field" value="{{ old('age', $user->age) }}" />
                </div>
            </div>

            <div>
                <x-input-label for="email" value="Email" />
                <input id="email" name="email" type="email" class="field" value="{{ old('email', $user->email) }}" required />
            </div>

            <div>
                <x-input-label for="role" value="Role" />
                <select id="role" name="role" class="field">
                    <option value="user" @selected(old('role', $user->role) === 'user')>user</option>
                    <option value="admin" @selected(old('role', $user->role) === 'admin')>admin</option>
                </select>
            </div>

            <div>
                <x-input-label for="bio" value="Bio" />
                <textarea id="bio" name="bio" rows="4" class="field">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div>
                <x-input-label for="profile_photo" value="Photo de profil" />
                <input id="profile_photo" name="profile_photo" type="file" class="field" />
            </div>

            <button type="submit" class="btn-primary">Enregistrer</button>
        </form>

        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-secondary">Supprimer</button>
        </form>
    </div>
</x-app-layout>
