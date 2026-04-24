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
        <footer class="relative mt-16 border-t border-slate-200 bg-white/90">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 sm:px-6 lg:grid-cols-3 lg:px-8">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.3em] text-amber-600">Ndame Keur Guiry</p>
                <p class="mt-6 text-sm leading-7 text-slate-600">Une platforme communautaire dédiée au sport, à la culture,à la solidarité et au dévelopment local.</p>
            </div>
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-[0.2em] text-slate-900">Contact</h2>
                <p class="mt-6 text-sm leading-7 text-slate-600">Rejoiniez l'association pour partager des idées, accompagner nos projets et restez informé.e.</p>
            </div>
            <div>
                 <p class="text-xs mt-2 text-gray-400">
                © {{ date('Y') }} Tous droits réservés
        </p>
            </div>
        </div>
    </footer>

</html>
