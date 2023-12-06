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


        //last month
        for($i = 1; $i <= 20; $i++){
            $order =  Order::create([
                 'code' => "ORD-" .  Str::random(10),
                 'user_id' => rand(3 , 10),
                 'status' => rand(0,1),
                 'session_id' => Str::random(10),
                 'payment_url' => fake()->url(),
                 'expired' => now()->addHour(),
                 'created_at' => now()->subMonths(1),
                 'updated_at' => now()->subMonths(1),
             ]);
 
             for($k = 1; $k <= rand(2,4); $k++){
                 $order->orderDetails()->create([
                     'product_id' => rand(1, 14),
                     'created_at' => now()->subMonths(1),
                     'updated_at' => now()->subMonths(1),
                 ]);
             }
         }

        
        //yesterday
        for($i = 1; $i <= 10; $i++){
           $order =  Order::create([
                'code' => "ORD-" .  Str::random(10),
                'user_id' => rand(3 , 10),
                'status' => rand(0,1),
                'session_id' => Str::random(10),
                'payment_url' => fake()->url(),
                'expired' => now()->addHour(),
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ]);

            for($k = 1; $k <= rand(2,4); $k++){
                $order->orderDetails()->create([
                    'product_id' => rand(1, 14),
                    'created_at' => now()->subDays(1),
                    'updated_at' => now()->subDays(1),
                ]);
            }
        }


        //today
        for($i = 1; $i <= 10; $i++){
            $order =  Order::create([
                 'code' => "ORD-" .  Str::random(10),
                 'user_id' => rand(3 , 10),
                 'status' => rand(0,1),
                 'session_id' => Str::random(10),
                 'payment_url' => fake()->url(),
                 'expired' => now()->addHour(),
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);
 
             for($k = 1; $k <= rand(2,4); $k++){
                 $order->orderDetails()->create([
                     'product_id' => rand(1, 14),
                     'created_at' => now(),
                     'updated_at' => now(),
                 ]);
             }
         }
    }
}
