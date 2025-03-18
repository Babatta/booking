<?php

namespace Database\Seeders;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property::create([
            'name' => 'Appartement Vue Mer',
            'description' => 'Appartement spacieux avec vue sur la mer.',
            'price_per_night' => 120.00
        ]);

        Property::create([
            'name' => 'Maison de Campagne',
            'description' => 'Maison traditionnelle située à la campagne.',
            'price_per_night' => 85,
        ]);

        Property::create([
            'name' => 'Maison moderne',
            'description' => 'Maison moderne  située à la lille.',
            'price_per_night' => 800,
        ]);

        Property::create([
            'name' => 'MRésidence alphine',
            'description' => 'Maison moderne  située Nice',
            'price_per_night' => 200,
        ]);

        Property::create([
            'name' => 'Maison pied sur mer',
            'description' => 'Maison moderne  située Monpellier.',
            'price_per_night' => 500,
        ]);
    }
}
