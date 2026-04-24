<x-app-layout>
    <x-slot name="header"><h1 class="headline text-3xl font-bold text-stone-950">Nouvel evenement</h1></x-slot>
    @include('admin.events.form', ['action' => route('admin.events.store'), 'method' => 'POST'])
</x-app-layout>
