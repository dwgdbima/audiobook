<?php

namespace App\Console\Commands;

use App\Contract\Service\OrderServiceInterface;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExpiredOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Order Expired';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(OrderServiceInterface $orderServiceInterface)
    {
        Log::info('check status order transaction');

        $orders = $orderServiceInterface->getUnSuccess();
        foreach($orders as $order){
            if(Carbon::parse($order->expired)->lt(Carbon::now())){
                $order->update(['status' => 2]);
            }
        }
    }
}
