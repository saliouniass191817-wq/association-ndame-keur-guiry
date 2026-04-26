@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-amber-500 focus:ring-red-950 rounded-md shadow-sm text-black']) }}>
