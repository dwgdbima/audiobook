<?php

namespace App\Repositories;

use App\Contract\Repository\ChapterRepositoryInterface;
use App\Models\Chapter;
use Exception;
use Illuminate\Support\Facades\DB;

class ChapterRepository extends BaseRepository implements ChapterRepositoryInterface
{
    protected $modelClass = \App\Models\Chapter::class;


    public function getOrderedChapterDependOnBookId($book_id, $ascending = true)
    {
     /*  $orderedChapters = $this->modelClass::where('book_id' , $book_id)
        ->orderBy(DB::raw("CAST(SUBSTRING(title FROM 8) AS UNSIGNED)"), 'DESC') // untuk mengambil urutan chapter database, ex Chapter 1, Chapter 2 dst
        ->get(); */

        $orderedChapters = $this->modelClass::where('book_id' , $book_id)
        ->orderBy('order_position' , $ascending ? 'ASC' : 'DESC')
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

    public function unAssignChapterToProduct(array $chapters)
    {
        try {
            $this->modelClass::whereIn('id' , $chapters)->update(['product_id' => null]);

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}