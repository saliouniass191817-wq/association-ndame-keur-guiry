@props(['comments'])

<div class="space-y-4">
    @forelse ($comments as $comment)
        <div class="rounded-2xl border border-stone-200 bg-stone-50 p-4">
            <div class="flex items-center justify-between gap-3">
                <p class="font-semibold text-stone-950">{{ $comment->user->full_name }}</p>
                <p class="text-xs text-stone-500">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <p class="mt-2 text-sm leading-7 text-stone-600">{{ $comment->content }}</p>
        </div>
    @empty
        <p class="text-sm text-stone-500">Aucun commentaire pour le moment.</p>
    @endforelse
</div>
