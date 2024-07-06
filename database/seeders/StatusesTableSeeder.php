<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('statuses')->insert([
            ['name' => 'New'],
            ['name' => 'SampleReception'],
            ['name' => 'SampleCut'],
            ['name' => 'Fixation'],
            ['name' => 'Inclusion'],
            ['name' => 'BlockCut'],
            ['name' => 'Staining'],
        ]);
    }
}
