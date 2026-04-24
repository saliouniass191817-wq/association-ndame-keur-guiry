<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectProposalController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/members', [PublicPageController::class, 'members'])->name('members.index');
Route::get('/projects', [PublicPageController::class, 'projects'])->name('public.projects.index');
Route::get('/projects/{project}', [PublicPageController::class, 'showProject'])->name('public.projects.show');
Route::get('/events', [PublicPageController::class, 'events'])->name('public.events.index');
Route::get('/news', [PublicPageController::class, 'news'])->name('public.news.index');
Route::get('/news/{post}', [PublicPageController::class, 'showPost'])->name('public.news.show');
Route::get('/ideas', [PublicPageController::class, 'ideas'])->name('public.ideas.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('member/ideas', IdeaController::class)
        ->only(['index', 'store', 'show'])
        ->names('ideas');
    Route::patch('member/ideas/{idea}/status', [IdeaController::class, 'updateStatus'])->name('ideas.status');

    Route::resource('project-proposals', ProjectProposalController::class)->only(['index', 'store', 'show']);
    Route::patch('project-proposals/{projectProposal}/status', [ProjectProposalController::class, 'updateStatus'])
        ->name('project-proposals.status');

    Route::post('/posts/{post}/comments', [CommentController::class, 'storeForPost'])->name('posts.comments.store');
    Route::post('/projects/{project}/comments', [CommentController::class, 'storeForProject'])->name('projects.comments.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');

    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('posts', PostController::class)->except(['show']);
    Route::resource('events', EventController::class)->except(['show']);
});

require __DIR__.'/auth.php';
