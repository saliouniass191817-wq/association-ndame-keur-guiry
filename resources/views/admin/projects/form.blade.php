<div class="surface p-8">
    <form method="POST" action="{{ $action }}" class="space-y-6">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div>
            <x-input-label for="title" value="Titre" />
            <input id="title" name="title" type="text" class="field" value="{{ old('title', $project->title) }}" required />
        </div>

        <div>
            <x-input-label for="description" value="Description" />
            <textarea id="description" name="description" rows="8" class="field" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div>
            <x-input-label for="status" value="Statut" />
            <select id="status" name="status" class="field">
                @foreach (['planifie', 'en cours', 'termine'] as $status)
                    <option value="{{ $status }}" @selected(old('status', $project->status ?: 'planifie') === $status)>{{ $status }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-primary">Enregistrer</button>
    </form>
</div>
