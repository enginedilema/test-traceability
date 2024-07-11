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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('asdf1234'),
        ]);
        $this->call([
            StatusesTableSeeder::class,
            SampleTypesTableSeeder::class,
            SamplesTableSeeder::class,
            SampleTypeExfoliativeSeeder::class,
            SampleTypePaafSeeder::class,
            OriginLabSeeder::class,
        ]);
    }
}
