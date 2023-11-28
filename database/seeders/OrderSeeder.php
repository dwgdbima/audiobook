<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        for($i = 1; $i <= 10; $i++){
           $order =  Order::create([
                'code' => "ORD-" .  Str::random(10),
                'user_id' => rand(3 , 10),
                'status' => rand(0,1),
                'session_id' => Str::random(10),
                'payment_url' => fake()->url(),
                'expired' => now()->addHour()
            ]);

            for($k = 1; $k <= 2; $k++){
                $order->orderDetails()->create([
                    'product_id' => rand(1, 14)
                ]);
            }
        }
    }
}
