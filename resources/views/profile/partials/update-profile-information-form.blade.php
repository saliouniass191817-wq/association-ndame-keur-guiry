<section>
    <header>
        <h2 class="headline text-2xl font-bold text-stone-950">Informations personnelles</h2>
        <p class="mt-2 text-sm text-stone-600">Mettez a jour votre identite, votre bio et votre photo.</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="first_name" value="Prenom" />
                <input id="first_name" name="first_name" type="text" class="field" value="{{ old('first_name', $user->first_name) }}" required />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>

            <div>
                <x-input-label for="second_name" value="Deuxieme prenom" />
                <input id="second_name" name="second_name" type="text" class="field" value="{{ old('second_name', $user->second_name) }}" />
                <x-input-error class="mt-2" :messages="$errors->get('second_name')" />
            </div>
        </div>

        <div>
            <x-input-label for="last_name" value="Nom" />
            <input id="last_name" name="last_name" type="text" class="field" value="{{ old('last_name', $user->last_name) }}" required />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
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
                <x-input-error class="mt-2" :messages="$errors->get('civility')" />
            </div>

            <div>
                <x-input-label for="sex" value="Sexe" />
                <select id="sex" name="sex" class="field">
                    <option value="">Choisir</option>
                    <option value="homme" @selected(old('sex', $user->sex) === 'homme')>Homme</option>
                    <option value="femme" @selected(old('sex', $user->sex) === 'femme')>Femme</option>
                    <option value="autre" @selected(old('sex', $user->sex) === 'autre')>Autre</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('sex')" />
            </div>

            <div>
                <x-input-label for="profession" value="Profession" />
                <input id="profession" name="profession" type="text" class="field" value="{{ old('profession', $user->profession) }}" />
                <x-input-error class="mt-2" :messages="$errors->get('profession')" />
            </div>

            <div>
                <x-input-label for="age" value="Age" />
                <input id="age" name="age" type="number" min="1" max="120" class="field" value="{{ old('age', $user->age) }}" />
                <x-input-error class="mt-2" :messages="$errors->get('age')" />
            </div>
        </div>

        <div>
            <x-input-label for="email" value="Email" />
            <input id="email" name="email" type="email" class="field" value="{{ old('email', $user->email) }}" required />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="bio" value="Bio" />
            <textarea id="bio" name="bio" rows="4" class="field">{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-input-label for="profile_photo" value="Photo de profil" />
            <input id="profile_photo" name="profile_photo" type="file" class="field" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="btn-primary">Enregistrer</button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-emerald-600">Profil mis a jour.</p>
            @endif
        </div>
    </form>
</section>
