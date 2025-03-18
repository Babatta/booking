<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    public function run()
    {
        // Créer un administrateur avec un rôle spécifique et un mot de passe sécurisé
        User::create([
            'name' => 'Administrateur',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'role' => 'admin', // Rôle administrateur spécifique
        ]);
       // Créer un administrateur avec un rôle spécifique et un mot de passe sécurisé
         User::create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'password' => Hash::make('superadmin'),
            'role' => 'user', // Rôle administrateur spécifique
        ]);

        // Créer 5 utilisateurs via la factory, avec des rôles aléatoires
        User::factory(5)->create();
    }
}
