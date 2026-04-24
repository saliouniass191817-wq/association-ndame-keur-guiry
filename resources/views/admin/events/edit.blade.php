<x-app-layout>
    <x-slot name="header"><h1 class="headline text-3xl font-bold text-stone-950">Modifier l'evenement</h1></x-slot>
    @include('admin.events.form', ['action' => route('admin.events.update', $event), 'method' => 'PATCH'])
</x-app-layout>
