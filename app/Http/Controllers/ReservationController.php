<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function set(Event $event)
    {
        // Reserve place for this event

        $event->reservations()->create([
            'user_id'   => auth()->id(),
        ]);

        return back()->with('success', 'Votre réservatio a été placée');
    }

    public function unset(Event $event)
    {
        // Unreserve place for this event

        $event->reservations()->where('user_id', auth()->id())->delete();

        return back()->with('success', 'Votre réservatio a été rétirée');
    }

    public function agenda()
    {
        // Get reserved events
        $reservations = Reservation::with('event')->where('user_id', auth()->id())->get();

        // We get only the reserved events without the relationship
        $events = collect();

        foreach ($reservations as $reservation) {
            $events->push($reservation->event);
        }

        // We will pass this events to event-list component
        return view('events.agenda', compact('events'));
    }
}
