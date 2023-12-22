<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Service\OrderServiceInterface;
use App\Export\AffiliateExport;
use App\Export\OrderExport;
use App\Export\OrderProductExport;
use App\Export\UserExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class ExportController extends Controller
{
    protected $orderServiceInterface;
    public function __construct(OrderServiceInterface $orderServiceInterface)
    {
        $this->orderServiceInterface = $orderServiceInterface;
    }

    public function exportUser(Request $request)
    {
        return Excel::download(new UserExport, 'user-data.' . $request->mimeType, $request->mimeType == 'xlsx' ? \Maatwebsite\Excel\Excel::XLSX : \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportAffiliate(Request $request)
    {
        return Excel::download(new AffiliateExport, 'affiliate-data.' . $request->mimeType, $request->mimeType == 'xlsx' ? \Maatwebsite\Excel\Excel::XLSX : \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportOrder(Request $request)
    {
        $status = $request->status == 1 ? 'Terbayar' : 'Belum Terbayar';

        $query = $this->orderServiceInterface->getAllOrders($request->status , false);
        $data = [
            'query' => $query,
            'status' => $status
        ];

        session()->put('order-export' , $data);

        return Excel::download(new OrderExport, 'orders-data-'. Str::slug($status) . '.' . $request->mimeType, $request->mimeType == 'xlsx' ? \Maatwebsite\Excel\Excel::XLSX : \Maatwebsite\Excel\Excel::CSV);
    }

    public function exportOrderProduct(Request $request)
    {
        $status = $request->status == 1 ? 'Terjual' : 'Belum Terbayar';

        $query = $this->orderServiceInterface->getSpecifiecOrderProduct($request->product, $request->status, false);
        $totalProduct = $this->orderServiceInterface->countSoldProduct($request->product , $request->status);

        $data = [
            'query' => $query,
            'status' => $status,
            'product' => $request->product,
            'total_product' => $totalProduct
        ];

        session()->put('order-export' , $data);

        return Excel::download(new OrderProductExport, 'order-data-product-'. $request->product . '-' . Str::slug($status) . '.' . $request->mimeType, $request->mimeType == 'xlsx' ? \Maatwebsite\Excel\Excel::XLSX : \Maatwebsite\Excel\Excel::CSV);
    }
}
