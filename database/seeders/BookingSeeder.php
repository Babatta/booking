<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\Property;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run()
    {
        // Vérifie s'il y a des utilisateurs et des propriétés
        if (User::count() == 0 || Property::count() == 0) {
            $this->command->warn('Aucun utilisateur ou aucune propriété trouvée. Seeders annulés.');
            return;
        }

        Booking::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'property_id' => Property::inRandomOrder()->first()->id,
            'start_date' => now()->addDays(5), 
            'end_date' => now()->addDays(10), 
        ]);

        Booking::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'property_id' => Property::inRandomOrder()->first()->id, 
            'start_date' => now()->addDays(7), 
            'end_date' => now()->addDays(12), 
        ]);

        Booking::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'property_id' => Property::inRandomOrder()->first()->id,
            'start_date' => now()->addDays(3), 
            'end_date' => now()->addDays(17), 
        ]);

        Booking::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'property_id' => Property::inRandomOrder()->first()->id,
            'start_date' => now()->addDays(5),
            'end_date' => now()->addDays(10),
        ]);

        Booking::create([
            'user_id' => User::inRandomOrder()->first()->id,
            'property_id' => Property::inRandomOrder()->first()->id,
            'start_date' => now()->addDays(7),
            'end_date' => now()->addDays(12),
        ]);
    }
}
