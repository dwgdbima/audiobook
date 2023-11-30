<?php

namespace App\Contract\Repository;

interface BookRepositoryInterface extends BaseRepositoryInterface
{
    public function storeBook(array $data);

    public function getAllWithRelationPagination();
}