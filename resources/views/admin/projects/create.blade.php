<x-app-layout>
    <x-slot name="header"><h1 class="headline text-3xl font-bold text-stone-950">Nouveau projet</h1></x-slot>
    @include('admin.projects.form', ['action' => route('admin.projects.store'), 'method' => 'POST'])
</x-app-layout>
