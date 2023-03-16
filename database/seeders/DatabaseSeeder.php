<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attendee;
use App\Models\EventDay;
use App\Models\Movie;
use App\Models\MovieBooking;
use App\Models\Showtime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         Attendee::factory(10)->create();
        $movies = Movie::factory(10)->create();
        Showtime::create(['movie_id' => $movies[0]->id, 'start_time' => '18:00:00', 'end_time' => '20:30:00']);
        Showtime::create(['movie_id' => $movies[1]->id, 'start_time' => '20:30:00', 'end_time' => '22:00:00']);
        Showtime::create(['movie_id' => $movies[2]->id, 'start_time' => '22:30:00', 'end_time' => '01:00:00']);
//         MovieBooking::factory(10)->create();
//         EventDay::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
