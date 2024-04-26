<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all events
        $events = Event::orderBy('date', 'desc')->get();

        return view('events.index',  compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request) : RedirectResponse
    {
        // Get all validated data
        $data = $request->validated();

        // Add user_id to the validated data
        $data['user_id'] = auth()->id();

        // Store image cover and get its path
        $data['cover'] = $request->file('cover')->store('covers', 'public');

        // Store event
        $event = Event::create($data);

        // Show the created event with success message
        return to_route('events.show', compact('event'))->with('success', "L'évènement a été publié");
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // Load all reservations for this event
        $event->load(['reservations', 'reservations.user']);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        // Get all validated data
        $data = $request->validated();

        // Add user_id to the validated data
        $data['user_id'] = auth()->id();

        
        // Check if a new image cover is given

        if ($request->hasFile('cover')) {
            // Delete old image
            Storage::disk('public')->delete($event->cover);

            // Store the new image cover and get its path
            $data['cover'] = $request->file('cover')->store('covers', 'public');

        }

        // Update event
        $event->update($data);

        // Show the created event with success message
        return to_route('events.show', compact('event'))->with('success', "L'évènement a été modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        // Delete event image cover
        Storage::disk('public')->delete($event->cover);

        // Delet event
        $event->delete();

        // Redirect to index
        return to_route('events.index')->with('success', "L'évènement a été supprimé");
    }

    public function myEvents()
    {
        $events = auth()->user()->events()->orderBy('date', 'desc')->get();

        return view('events.mine', compact('events'));
    }
}
