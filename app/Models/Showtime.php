<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Showtime extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'movie_id',
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function eventDays(): BelongsToMany
    {
        return $this->belongsToMany(EventDay::class)->withTimestamps();
    }
}
