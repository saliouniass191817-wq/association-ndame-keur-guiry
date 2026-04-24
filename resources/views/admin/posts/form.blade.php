<div class="surface p-8">
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if ($method !== 'POST')
            @method($method)
        @endif

        <div>
            <x-input-label for="title" value="Titre" />
            <input id="title" name="title" type="text" class="field" value="{{ old('title', $post->title) }}" required />
        </div>

        <div>
            <x-input-label for="content" value="Contenu" />
            <textarea id="content" name="content" rows="10" class="field" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div>
            <x-input-label for="image" value="Image" />
            <input id="image" name="image" type="file" class="field" />
        </div>

        <button type="submit" class="btn-primary">Enregistrer</button>
    </form>
</div>
