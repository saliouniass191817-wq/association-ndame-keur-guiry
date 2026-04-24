<div class="surface p-8">
    <form method="POST" action="{{ $action }}" class="space-y-6">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div>
            <x-input-label for="title" value="Titre" />
            <input id="title" name="title" type="text" class="field" value="{{ old('title', $event->title) }}" required />
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <x-input-label for="date" value="Date" />
                <input id="date" name="date" type="date" class="field" value="{{ old('date', optional($event->date)->format('Y-m-d')) }}" required />
            </div>
            <div>
                <x-input-label for="location" value="Lieu" />
                <input id="location" name="location" type="text" class="field" value="{{ old('location', $event->location) }}" required />
            </div>
        </div>

        <div>
            <x-input-label for="description" value="Description" />
            <textarea id="description" name="description" rows="8" class="field" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <button type="submit" class="btn-primary">Enregistrer</button>
    </form>
</div>
