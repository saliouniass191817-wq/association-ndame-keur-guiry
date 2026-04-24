<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index(): View
    {
        return view('admin.events.index', [
            'events' => Event::orderBy('date')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.events.create', [
            'event' => new Event(),
        ]);
    }

    public function store(StoreEventRequest $request): RedirectResponse
    {
        Event::create($request->validated());

        return redirect()->route('admin.events.index')->with('status', 'event-saved');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(StoreEventRequest $request, Event $event): RedirectResponse
    {
        $event->update($request->validated());

        return redirect()->route('admin.events.index')->with('status', 'event-saved');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('status', 'event-deleted');
    }
}
