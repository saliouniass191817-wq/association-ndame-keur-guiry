<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function storeForPost(StoreCommentRequest $request, Post $post): RedirectResponse
    {
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $request->validated('content'),
        ]);

        return back()->with('status', 'comment-created');
    }

    public function storeForProject(StoreCommentRequest $request, Project $project): RedirectResponse
    {
        $project->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $request->validated('content'),
        ]);

        return back()->with('status', 'comment-created');
    }
}
