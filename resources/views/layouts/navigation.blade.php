<nav x-data="{ open: false }" class="border-b border-stone-200/80 bg-green-900 text-blue backdrop-blur">
    <div class="shell flex h-20 items-center justify-between">
        <div class="flex items-center gap-6">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <x-application-logo class="h-10 w-10" />
                <div>
                    <div class="headline text-lg font-bold text-stone-950">AJNDKG</div>
                    <div class="text-xs uppercase tracking-[0.35em] text-stone-500">Association des Jeunes <br> De Ndame Keur Guiry</div>
                </div>
            </a>

            <div class="hidden items-center gap-5 text-sm text-stone-600 lg:flex">
                <a href="{{ route('members.index') }}" class="hover:text-stone-950" >Membres</a>
                <a href="{{ route('public.projects.index') }}" class="hover:text-stone-950">Projets</a>
                <a href="{{ route('public.events.index') }}" class="hover:text-stone-950">Evénements</a>
                <a href="{{ route('public.news.index') }}" class="hover:text-stone-950">Actualités</a>
                <a href="{{ route('public.ideas.index') }}" class="hover:text-stone-950">Idées approuvées</a>
            </div>
        </div>

        <div class="hidden items-center gap-3 lg:flex">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-secondary">Mon espace</a>

                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-primary">Admin</a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-full px-4 py-2 text-sm font-medium text-stone-600 hover:text-stone-950">
                        Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-secondary">Connexion</a>
                <a href="{{ route('register') }}" class="btn-primary">Inscription</a>
            @endauth
        </div>

        <button @click="open = !open" class="rounded-full border border-stone-300 p-3 lg:hidden">
            <svg class="h-5 w-5 text-stone-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div x-show="open" x-transition class="border-t border-stone-200 bg-white lg:hidden">
        <div class="shell space-y-3 py-4 text-sm text-stone-700">
            <a href="{{ route('members.index') }}" class="block hover:border-stone-400 text-green-500" >Membres</a>
            <a href="{{ route('public.projects.index') }}" class="block">Projets</a>
            <a href="{{ route('public.events.index') }}" class="block">Evénements</a>
            <a href="{{ route('public.news.index') }}" class="block">Actualités</a>
            <a href="{{ route('public.ideas.index') }}" class="block">Idées approuvées</a>

            @auth
                <a href="{{ route('dashboard') }}" class="block">Mon espace</a>

                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="block">Administration</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="block">Connexion</a>
                <a href="{{ route('register') }}" class="block">Inscription</a>
            @endauth
        </div>
    </div>
</nav>
