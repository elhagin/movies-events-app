<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EventDay extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'day',
        'created_at',
        'updated_at',
    ];

    public function showtimes(): BelongsToMany
    {
        return $this->belongsToMany(Showtime::class)->withTimestamps();
    }

    public function bookings() {
        return $this->hasMany(MovieBooking::class);
    }
}
