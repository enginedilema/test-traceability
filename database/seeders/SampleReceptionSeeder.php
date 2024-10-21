<?php

namespace Database\Seeders;

use App\Models\OriginLab;
use App\Models\Sample;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\User;
use App\Models\SampleReception;
use App\Models\SampleTypeExfoliative;

class SampleReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $samples = Sample::where('status_id', 1)->where('qr_code','LIKE','sample01%')->limit(10)->get();

        $facker = \Faker\Factory::create('es_ES');

        foreach ($samples as $sample) {

            SampleReception::create([
                'sample_id' => $sample->id,
                'patient_name' => $facker->name('female'),
                'gender' => 'F',
                'age' => $facker->numberBetween(40, 90),
                'origin_lab_id' => OriginLab::inRandomOrder()->first()->id,
                'requesting_person' => $facker->name,
                'registration_date' => $facker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'technical_id' => User::inRandomOrder()->first()->id,
                'exfoliative_sample_type_id' => SampleTypeExfoliative::inRandomOrder()->first()->id,
                'updated_at' => now(),
                'created_at' => now(),
            ]);

            $sample->status_id = Status::where('name', 'SampleReception')->first()->id;
            $sample->save();
        }
    }
}
