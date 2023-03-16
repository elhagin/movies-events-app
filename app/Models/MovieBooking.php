<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieBooking extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'attendee_id',
        'showtime_id',
        'event_day_id',
        'created_at',
        'updated_at',
    ];

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }
    public function eventDay()
    {
        return $this->belongsTo(EventDay::class);
    }
}
