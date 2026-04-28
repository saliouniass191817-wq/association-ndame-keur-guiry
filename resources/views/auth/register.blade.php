<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="first_name" value="Prénom" class="text-stone-200" />
                <x-text-input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" class="field" required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="second_name" value="Surnom" class="text-stone-200" />
                <x-text-input id="second_name" name="second_name" type="text" value="{{ old('second_name') }}" class="field" />
                <x-input-error :messages="$errors->get('second_name')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input-label for="last_name" value="Nom" class="text-stone-200" />
            <x-text-input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" class="field" required />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <div class="grid gap-5 sm:grid-cols-4">
            <div>
                <x-input-label for="civility" value="Civilité" class="text-stone-200" />
                <select id="civility" name="civility" class="field">
                    <option value="">Choisir</option>
                    <option value="M." @selected(old('civility') === 'M.')>M.</option>
                    <option value="Mme" @selected(old('civility') === 'Mme')>Mme</option>
                    <option value="Mlle" @selected(old('civility') === 'Mlle')>Mlle</option>
                </select>
                <x-input-error :messages="$errors->get('civility')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="sex" value="Sexe" class="text-stone-200" />
                <select id="sex" name="sex" class="field">
                    <option value="">Choisir</option>
                    <option value="homme" @selected(old('sex') === 'homme')>Homme</option>
                    <option value="femme" @selected(old('sex') === 'femme')>Femme</option>
                </select>
                <x-input-error :messages="$errors->get('sex')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="profession" value="Proféssion" class="text-stone-200" />
                <inx-text-inputput id="profession" name="profession" type="text" value="{{ old('profession') }}" class="field" />
                <x-input-error :messages="$errors->get('profession')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="age" value="Age" class="text-stone-200" />
                <x-text-input id="age" name="age" type="number" min="1" max="120" value="{{ old('age') }}" class="field" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>
        </div>

        <div>
            <x-input-label for="email" value="Email" class="text-stone-200" />
            <x-text-input id="email" name="email" type="email" value="{{ old('email') }}" class="field" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="bio" value="Bio" class="text-stone-200" />
            <textarea id="bio" name="bio" rows="3" class="field">{{ old('bio') }}</textarea>
            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="profile_photo" value="Photo de profil" class="text-stone-200" />
            <x-text-input id="profile_photo" name="profile_photo" type="file" class="field" />
            <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="password" value="Mot de passe" class="text-stone-200" />
                <x-text-input id="password" name="password" type="password" class="field" required />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="Confirmation" class="text-stone-200" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="field" required />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-between">
            <a class="text-sm text-stone-300 hover:text-white" href="{{ route('login') }}">
                Déjà inscrit ?
            </a>

            <button type="submit" class="btn-primary">
                Créer mon compte
            </button>
        </div>
    </form>
</x-guest-layout>
