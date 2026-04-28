<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Communauté AJNDKG') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-stone-950 text-stone-100 antialiased">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(245,158,11,0.18),_transparent_32%)]"></div>

        <div class="relative flex min-h-screen items-center justify-center px-4 py-12">
            <div class="w-full max-w-md rounded-[2rem] border border-white/10 bg-white/10 p-8 shadow-2xl shadow-black/30 backdrop-blur">
                <div class="mb-8 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                        <x-application-logo class="h-16 w-16" />
                    </a>
                    <p class="mt-4 text-sm text-stone-300">Plateforme communautaire de Ndame Keur Guiry</p>
                </div>

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
