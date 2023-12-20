<?php

namespace App\Export;

use App\Contract\Service\AffiliatorServiceInterface;
use App\Models\Affiliator;
use App\Services\AffiliatorService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AffiliateExport implements FromView
{

    public function view(): View
    {
        $affiliators = Affiliator::with(['user'])->orderBy('created_at' , 'ASC')->get();

        return view('web.admin.export.affiliate-export' , [
            'affiliators' => $affiliators
           ]);
    }
}