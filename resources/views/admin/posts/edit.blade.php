<x-app-layout>
    <x-slot name="header"><h1 class="headline text-3xl font-bold text-stone-950">Modifier l'actualite</h1></x-slot>
    @include('admin.posts.form', ['action' => route('admin.posts.update', $post), 'method' => 'PATCH'])
</x-app-layout>
