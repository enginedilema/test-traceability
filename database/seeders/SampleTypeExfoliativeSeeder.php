<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleTypeExfoliativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Vaginal simple',
            'Cervico-vaginal (triple presa)',
            'Endometri',
            'Esput',
            'BAS (broncoaspirat)',
            'BAL (rentat broncoalveolar)',
            'Raspallat bronquial',
            'Orina',
            'Líquid pleural',
            'Líquid ascític',
            'LCR',
            'Raspat pell mama',
            'Secreció mama',
            'Altres'
        ];

        foreach ($types as $type) {
            DB::table('sample_type_exfoliatives')->insert([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
