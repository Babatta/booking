<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; // Importation de Hash si tu veux hacher le mot de passe
use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run()

        {
        // je supprime m+les données dans la base avant de réinserer 
        DB::table('properties')->delete();
        DB::table('users')->delete();
        DB::table('bookings')->delete();

        

        
            // Appeler le seeder UserSeeder pour insérer les utilisateurs
            $this->call(PropertySeeder::class);
            $this->call(UserSeeder::class);
            $this->call(BookingSeeder::class);


        }
    }

