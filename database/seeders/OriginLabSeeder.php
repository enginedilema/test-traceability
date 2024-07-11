<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OriginLabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origins = [
            'AT10',
            'LAB10',
            'Altres'
        ];

        foreach ($origins as $origin) {
            DB::table('origin_labs')->insert([
                'name' => $origin,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
