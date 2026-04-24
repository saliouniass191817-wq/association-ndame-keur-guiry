<x-app-layout>
    <x-slot name="header"><h1 class="headline text-3xl font-bold text-stone-950">Nouvelle actualite</h1></x-slot>
    @include('admin.posts.form', ['action' => route('admin.posts.store'), 'method' => 'POST'])
</x-app-layout>
