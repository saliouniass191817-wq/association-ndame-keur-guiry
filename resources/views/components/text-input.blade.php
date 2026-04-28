@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'input-text text-green-600']) }}>
