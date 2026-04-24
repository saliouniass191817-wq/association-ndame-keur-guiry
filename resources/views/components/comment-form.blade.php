@props(['action'])

@auth
    <form method="POST" action="{{ $action }}" class="space-y-4">
        @csrf
        <div>
            <x-input-label for="content" value="Ajouter un commentaire" />
            <textarea id="content" name="content" rows="4" class="field" required>{{ old('content') }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <button type="submit" class="btn-primary">Publier</button>
    </form>
@else
    <div class="rounded-2xl border border-stone-200 bg-stone-50 p-4 text-sm text-stone-600">
        Connectez-vous pour participer aux discussions.
    </div>
@endauth
