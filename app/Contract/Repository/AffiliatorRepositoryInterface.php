<?php

namespace App\Contract\Repository;

interface AffiliatorRepositoryInterface extends BaseRepositoryInterface
{
    public function searchByName(string $name);
}