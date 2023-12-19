<?php

namespace App\Repositories;

use App\Contract\Repository\AffiliatorRepositoryInterface;

class AffiliatorRepository extends BaseRepository implements AffiliatorRepositoryInterface
{
    protected $modelClass = \App\Models\Affiliator::class;

    public function searchByName(string $name)
    {
        $data = $this->modelClass::whereHas('user', function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        })->with('user') 
        ->paginate(5)
        ->withQueryString();

        return $data;
    }
}