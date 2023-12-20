<?php

namespace App\Export;

use App\Contract\Repository\UserRepositoryInterface;
use App\Models\Order;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class UserExport implements FromView
{
   

    public function view(): View
    {
        $customers = User::role('customer')->orderBy('created_at' , 'ASC')->get();
        return view('web.admin.export.user-export' , [
            'customers' => $customers
           ]);
    }
}