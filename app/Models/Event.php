<?php

namespace App\Models;

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
}
