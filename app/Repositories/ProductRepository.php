<?php

namespace App\Repositories;

use App\Contract\Repository\ProductRepositoryInterface;
use Exception;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $modelClass = \App\Models\Product::class;

    public function storeBulkProduct(array $data)
    {
       try {
             $this->modelClass::insert($data);

            return true;
       } catch (\Exception $e) {
            return $e;
       }
    }

    public function updateProductDependOnBook(array $data)
    {
          try {
               $product = $this->modelClass::where('id' , $data['product_id'])
               ->where('book_id' , $data['book_id'])
               ->update([
               'name' => $data['name'],
               'price' => $data['price'],
               ]);

               return true;
          } catch (Exception $e) {
               return $e;
          }
    }
}