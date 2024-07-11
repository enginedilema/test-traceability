<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleTypePaafSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Gangli limfàtic',
            'Glàndula salival',
            'Mama',
            'Parts toves',
            'Tiroide',
            'Altres'
        ];

        foreach ($types as $type) {
            DB::table('sample_type_paafs')->insert([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
