<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\HomeController;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendee_id')->constrained()->cascadeOnDelete();
            $table->foreignId('showtime_id')->constrained()->cascadeOnDelete();
            $table->foreignId('event_day_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('movie_bookings');
        Schema::enableForeignKeyConstraints();
    }
};
