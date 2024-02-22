<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pokemon;
use App\Models\User;
use Database\Factories\PokemonFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(!app()->environment(('production'))){
            $this->call(PokemonSeeder::class);
        }
    }
}
