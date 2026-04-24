<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaStatusRequest;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IdeaController extends Controller
{
    public function index(): View
    {
        $user = request()->user();

        return view('ideas.index', [
            'ideas' => $user->isAdmin()
                ? Idea::with('user')->latest()->get()
                : $user->ideas()->latest()->get(),
            'pendingIdeas' => $user->isAdmin()
                ? Idea::with('user')->where('status', Idea::STATUS_PENDING)->latest()->get()
                : collect(),
        ]);
    }

    public function store(StoreIdeaRequest $request): RedirectResponse
    {
        $request->user()->ideas()->create($request->validated());

        return back()->with('status', 'idea-created');
    }

    public function show(Idea $idea): View
    {
        abort_unless(
            request()->user()->isAdmin() || $idea->user_id === request()->user()->id,
            403
        );

        return view('ideas.show', [
            'idea' => $idea->load('user'),
        ]);
    }

    public function updateStatus(UpdateIdeaStatusRequest $request, Idea $idea): RedirectResponse
    {
        $idea->update($request->validated());

        return back()->with('status', 'idea-reviewed');
    }
}
