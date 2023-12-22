<?php

namespace App\Export;

use App\Contract\Service\AffiliatorServiceInterface;
use App\Models\Affiliator;
use App\Services\AffiliatorService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{

    public function view(): View
    {
        $orders = session()->get('order-export');
        
        session()->forget('order-export');
        return view('web.admin.export.order-export' , [
            'orders' => $orders['query'],
            'status' => $orders['status']
           ]);
    }
}