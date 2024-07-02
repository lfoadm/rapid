<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Humberto Oliveira',
            'email' => 'humbertoo@hlcorp.com.br',
            //'role' => 'admin'
        ]);
        
        User::factory(4)->create();
    }
}
