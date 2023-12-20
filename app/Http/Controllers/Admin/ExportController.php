<?php

namespace App\Http\Controllers\Admin;

use App\Export\AffiliateExport;
use App\Export\UserExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{

    public function exportUser(Request $request)
    {
        return Excel::download(new UserExport, 'user-data.' . $request->mimeType, $request->mimeType == 'xlsx' ? \Maatwebsite\Excel\Excel::XLSX : \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportAffiliate(Request $request)
    {
        return Excel::download(new AffiliateExport, 'affiliate-data.' . $request->mimeType, $request->mimeType == 'xlsx' ? \Maatwebsite\Excel\Excel::XLSX : \Maatwebsite\Excel\Excel::CSV);
    }
}
