<?php

namespace Database\Factories;

use App\Models\EventDay;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventDay>
 */
class EventDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $day = date_format(self::factoryForModel('Showtime')->createOne()->showtime, 'Y-m-d');
        while (EventDay::where('day', $day)->exists()) {
            $newDay = fake()->dateTimeBetween('now', '+1 month', 'Africa/Cairo');
            $day = date_format(self::factoryForModel('Showtime')->createOne(['showtime' => $newDay])->showtime, 'Y-m-d');
        }
        return [
            'day' => $day,
        ];
    }
}
