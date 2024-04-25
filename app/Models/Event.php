<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCover() : string
    {
        return Storage::disk('public')->url($this->cover);
    }

    public function reservations() : HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function isReserved()
    {
        // Check if user reserved for this event
        
        $reservation = $this->reservations()->where('user_id', auth()->id())->first();

        if ($reservation !== null) {
            return true;
        } else {
            return false;
        }
    }

    public function isPassed(bool $getBoolVal = false)
    {
        // Check if event has been passed
        
        $event_date = $this->date;
        $current_date = date('Y-m-d');

        if ($current_date > $event_date) {
            return $getBoolVal === false ? "Passé" : true;
        } elseif ($current_date == $event_date) {
            return $getBoolVal === false ? "Aujourd'hui" : false;
        } else {
            return $getBoolVal === false ? "A venir" : false;
        }
    }
}
