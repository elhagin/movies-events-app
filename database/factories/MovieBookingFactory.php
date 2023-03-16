<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieBooking>
 */
class MovieBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'attendee_id' => self::factoryForModel('Attendee')->createOne(),
            'showtime_id' => self::factoryForModel('Showtime')->createOne(),
            'event_day_id' => self::factoryForModel('EventDay')->createOne(),
        ];
    }
}
