<?php

namespace App\Repositories;

use App\Contract\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $modelClass = \App\Models\User::class;

    public function test()
    {
        return $this;
    }

    public function getAllCustomer()
    {
        $customers = $this->modelClass::role('customer')
        ->with(['orders' , 'reviews'])
        ->paginate(5)
        ->withQueryString();

        foreach($customers as &$data){
            $data['total_orders'] = $data->orders->count();
            $data['total_reviews'] = $data->reviews->count();
        }
        return $customers;
    }


    public function searchByName(string $name)
    {
      
        $customers = $this->modelClass::role('customer')
        ->with(['orders' , 'reviews'])
        ->where('name' , 'like' , '%' . $name . '%')
        ->paginate(5)
        ->withQueryString();

        foreach($customers as &$data){
            $data['total_orders'] = $data->orders->count();
            $data['total_reviews'] = $data->reviews->count();
        }
        return $customers;
    }
}