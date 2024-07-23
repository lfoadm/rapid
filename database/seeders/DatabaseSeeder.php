<?php

namespace Database\Seeders;

use App\Models\Admin\Candidate;
use App\Models\Admin\City;
use App\Models\User;
use Database\Factories\CityFactory;
use Faker\Factory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Pest\Laravel\call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Leandro Oliveira',
            'email' => 'lfoadm@icloud.com',
            'role' => 'ADMIN'
        ]);

        User::factory()->create([
            'name' => 'Humberto Oliveira',
            'email' => 'humbertoo@hlcorp.com.br',
            //'role' => 'ADMIN'
        ]);        
        
        User::factory(1)->create();

        City::factory()->create([
            'name' => 'ITURAMA',
            'state' => 'MG',
        ]);

        City::factory()->create([
            'name' => 'CARNEIRINHO',
            'state' => 'MG',
        ]);
      
        Candidate::factory(18)->create();
    }
}

