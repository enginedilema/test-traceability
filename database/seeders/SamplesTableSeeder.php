<?php

namespace Database\Seeders;

use App\Models\Sample;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\User;

class SamplesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('name', 'Admin')->first();
        $status = Status::where('name', 'New')->first()->id;
        for($i = 1; $i <= 50; $i++) {
            try{
            Sample::create([
                "qr_code" => "Z" . str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT),
                "status_id" => $status,
                "user_id" => $user->id,
            ]);
            } catch (\Exception $e) {
                continue;
            }
        }
    }
}
