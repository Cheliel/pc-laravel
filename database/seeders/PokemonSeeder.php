<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::Factory()->createOne();
        Pokemon::factory()->count(36)->create([
            'user_id' => $user->id
        ]);
    }
}
