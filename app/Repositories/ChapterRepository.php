<?php

namespace App\Repositories;

use App\Contract\Repository\ChapterRepositoryInterface;
use App\Models\Chapter;
use Exception;
use Illuminate\Support\Facades\DB;

class ChapterRepository extends BaseRepository implements ChapterRepositoryInterface
{
    protected $modelClass = \App\Models\Chapter::class;


    public function getOrderedChapterDependOnBookId($book_id)
    {
      $orderedChapters = $this->modelClass::where('book_id' , $book_id)
        ->orderBy(DB::raw("CAST(SUBSTRING(title FROM 8) AS UNSIGNED)"), 'DESC')
        ->get();

        return $orderedChapters;
    }

    public function storeBulkChapters(array $data)
    {
       try {
        $chapters = $this->modelClass::insert($data);

        return $chapters;
       } catch (Exception $e) {
        return $e;
       }
    }


    public function assignProductToChapter(array $assignedChapter, int $productId)
    {
        try {
            Chapter::whereIn('id' , $assignedChapter)->update([
                'product_id' => $productId
            ]);

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}