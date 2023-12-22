<?php

namespace App\Export;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderProductExport implements FromView
{

    public function view(): View
    {
        $orders = session()->get('order-export');
        
        session()->forget('order-export');
        return view('web.admin.export.order-export-product' , [
            'orders' => $orders['query'],
            'status' => $orders['status'],
            'product' => $orders['product'],
            'total_product' => $orders['total_product']
           ]);
    }
}