<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sample_types')->insert([
            ['type' => 'Blood'],
            ['type' => 'Urine'],
            ['type' => 'Saliva'],
            ['type' => 'Tissue'],
            ['type' => 'Hair'],
            ['type' => 'Nail'],
        ]);
    }
}
