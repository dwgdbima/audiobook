<?php

namespace App\Contract\Repository;

interface ChapterRepositoryInterface extends BaseRepositoryInterface
{
    public function getOrderedChapterDependOnBookId($book_id, $ascending = true);
    
    public function getChaptersExistsDependOnBookId($book_id , array $searchArray);

    public function storeBulkChapters(array $data);

    public function assignProductToChapter(array $assignedChapter, int $productId);

    public function unAssignChapterToProduct(array $chapters);
}