<?php

namespace Database\Seeders;

use App\Models\Affiliator;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AffiliatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 3; $i <= 10; $i++){
            Affiliator::create([
                'user_id' => $i,
                'referral_code' => 'CODE-' . rand(1111111,9999999),
                'ipaymu_email' => fake()->email(),
                'ipaymu_key' => fake()->uuid(),
                'ipaymu_va' => 'VA-' . rand(1111111,9999999),
            ]);
        }
        
    }
}
