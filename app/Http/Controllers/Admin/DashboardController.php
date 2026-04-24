<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Idea;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectProposal;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'users' => User::count(),
                'ideas_pending' => Idea::where('status', Idea::STATUS_PENDING)->count(),
                'proposals_pending' => ProjectProposal::where('status', ProjectProposal::STATUS_PENDING)->count(),
                'projects' => Project::count(),
                'posts' => Post::count(),
                'events' => Event::count(),
            ],
            'latestIdeas' => Idea::with('user')->latest()->take(5)->get(),
            'latestProposals' => ProjectProposal::with('user')->latest()->take(5)->get(),
        ]);
    }
}
