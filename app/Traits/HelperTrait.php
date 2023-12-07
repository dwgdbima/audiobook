<?php 

namespace App\Traits;

trait HelperTrait
{
    public function sellingPercentageResult(array $data)
    {
        $result = [
            'daily' => [
                'percentage' => round($data[0]['percentage']),
                'range' => [
                    $data[0]['range'][0],
                    $data[0]['range'][1]
                ],
                'labels' => [
                    now()->subDays(1)->isoFormat('dddd'),
                    now()->isoFormat('dddd'),
                ]
            ],
            'monthly' => [
                'percentage' => round($data[1]['percentage']),
                'range' => [
                    $data[1]['range'][0],
                    $data[1]['range'][1]
                ],
                'labels' => [
                    now()->subMonths(1)->isoFormat('MMMM'),
                    now()->isoFormat('MMMM'),
                ]
            ]
        ];
        return $result;
    }
}