<?php

namespace App\Console\Commands;

use App\Contract\Service\OrderServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExpiredOrderHourBefore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:expired-hour-before';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check order expired hour before';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(OrderServiceInterface $orderService)
    {
        $orders = $orderService->getUnSuccessHoursBefore();
        Log::info($orders);
        foreach($orders as $order){
            $order->update(['status' => 2]);
        }
    }
}
