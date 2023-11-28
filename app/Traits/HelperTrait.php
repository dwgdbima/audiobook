<?php 

namespace App\Traits;

trait HelperTrait
{
    public function storeDataToCollection(array $data)
    {
        $newData = collect();
        foreach ($data as $key => $value) {
            $newData[$key] = $value;
        }

        return $newData;
    }
}