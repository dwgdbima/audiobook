<?php

namespace App\Contract\Repository;

interface ChapterRepositoryInterface extends BaseRepositoryInterface
{
    public function storeBulkChapters(array $data);
}