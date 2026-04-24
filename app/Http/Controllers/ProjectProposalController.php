<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectProposalRequest;
use App\Http\Requests\UpdateProjectProposalStatusRequest;
use App\Models\ProjectProposal;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProjectProposalController extends Controller
{
    public function index(): View
    {
        $user = request()->user();

        return view('project-proposals.index', [
            'proposals' => $user->isAdmin()
                ? ProjectProposal::with('user')->latest()->get()
                : $user->projectProposals()->latest()->get(),
            'pendingProposals' => $user->isAdmin()
                ? ProjectProposal::with('user')->where('status', ProjectProposal::STATUS_PENDING)->latest()->get()
                : collect(),
        ]);
    }

    public function store(StoreProjectProposalRequest $request): RedirectResponse
    {
        $request->user()->projectProposals()->create($request->validated());

        return back()->with('status', 'proposal-created');
    }

    public function show(ProjectProposal $projectProposal): View
    {
        abort_unless(
            request()->user()->isAdmin() || $projectProposal->user_id === request()->user()->id,
            403
        );

        return view('project-proposals.show', [
            'proposal' => $projectProposal->load('user'),
        ]);
    }

    public function updateStatus(UpdateProjectProposalStatusRequest $request, ProjectProposal $projectProposal): RedirectResponse
    {
        $projectProposal->update($request->validated());

        return back()->with('status', 'proposal-reviewed');
    }
}
