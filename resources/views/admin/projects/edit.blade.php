<x-app-layout>
    <x-slot name="header"><h1 class="headline text-3xl font-bold text-stone-950">Modifier le projet</h1></x-slot>
    @include('admin.projects.form', ['action' => route('admin.projects.update', $project), 'method' => 'PATCH'])
</x-app-layout>
