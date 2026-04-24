<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm uppercase tracking-[0.35em] text-stone-500">Administration</p>
                <h1 class="headline text-3xl font-bold text-stone-950">Gestion des membres</h1>
            </div>
        </div>
    </x-slot>

    <div class="surface overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-stone-100 text-stone-600">
                    <tr>
                        <th class="px-6 py-4">Nom</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Civilité</th>
                        <th class="px-6 py-4">Proféssion</th>
                        <th class="px-6 py-4">Age</th>
                        <th class="px-6 py-4">Rôle</th>
                        <th class="px-6 py-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-t border-stone-200">
                            <td class="px-6 py-4">{{ $user->full_name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">{{ $user->civility ?: '-' }}</td>
                            <td class="px-6 py-4">{{ $user->profession ?: '-' }}</td>
                            <td class="px-6 py-4">{{ $user->age ?: '-' }}</td>
                            <td class="px-6 py-4">{{ $user->role }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-amber-600 hover:text-amber-700">Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
