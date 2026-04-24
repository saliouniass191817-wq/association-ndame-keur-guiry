<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Idea;
use App\Models\Post;
use App\Models\Project;
use App\Models\ProjectProposal;
use App\Models\User;
use Illuminate\View\View;

class PublicPageController extends Controller
{
    public function home(): View
    {
        return view('public.home', [
            'membersCount' => User::count(),
            'approvedIdeasCount' => Idea::approved()->count(),
            'approvedProposalsCount' => ProjectProposal::approved()->count(),
            'projects' => Project::latest()->take(3)->get(),
            'posts' => Post::latest()->take(3)->get(),
            'events' => Event::orderBy('date')->take(3)->get(),
        ]);
    }

    public function members(): View
    {
        return view('public.members', [
            'members' => User::orderBy('first_name')->orderBy('last_name')->get(),
        ]);
    }

    public function projects(): View
    {
        return view('public.projects', [
            'projects' => Project::latest()->get(),
        ]);
    }

    public function showProject(Project $project): View
    {
        return view('public.project-show', [
            'project' => $project->load('comments.user'),
        ]);
    }

    public function events(): View
    {
        return view('public.events', [
            'events' => Event::orderBy('date')->get(),
        ]);
    }

    public function news(): View
    {
        return view('public.news', [
            'posts' => Post::latest()->get(),
        ]);
    }

    public function showPost(Post $post): View
    {
        return view('public.post-show', [
            'post' => $post->load('comments.user'),
        ]);
    }

    public function ideas(): View
    {
        return view('public.ideas', [
            'ideas' => Idea::approved()->with('user')->latest()->get(),
        ]);
    }
}
