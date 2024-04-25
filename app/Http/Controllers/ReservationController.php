<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

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
}
