<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AJNDKK Community') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(245,158,11,0.18),_transparent_28%),linear-gradient(180deg,#fafaf9_0%,#f5f5f4_100%)] font-['Figtree'] text-stone-900 antialiased">
        @include('layouts.navigation')

        @isset($header)
            <header class="border-b border-stone-200/80 bg-white/70 backdrop-blur">
                <div class="shell py-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="py-10">
            <div class="shell">
                @if (session('status'))
                    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('status') }}
                    </div>
                @endif

                {{ $slot }}
            </div>
        </main>
    </body>
</html>
