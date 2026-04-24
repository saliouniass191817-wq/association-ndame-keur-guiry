@props(['status'])

@php
    $styles = match ($status) {
        'approuvee' => 'bg-emerald-100 text-emerald-700',
        'rejetee' => 'bg-rose-100 text-rose-700',
        'en cours' => 'bg-sky-100 text-sky-700',
        'termine' => 'bg-stone-200 text-stone-700',
        default => 'bg-amber-100 text-amber-700',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex rounded-full px-3 py-1 text-xs font-semibold {$styles}"]) }}>
    {{ $status }}
</span>
