<?php

namespace App\Services;

use App\Contract\Repository\ChapterRepositoryInterface;
use App\Contract\Service\ChapterServiceInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Models\Chapter;
use App\Repositories\BookRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChapterService extends BaseService implements ChapterServiceInterface
{
    //protected $repository = \App\Repositories\ChapterRepository::class;
    protected $orderService;
    protected $bookRepository;
    protected $repository;

    public function __construct(ChapterRepositoryInterface $chapterRepositoryInterface, OrderServiceInterface $orderServiceInterface, BookRepository $bookRepository)
    {
        $this->repository = $chapterRepositoryInterface;
        $this->orderService = $orderServiceInterface;
        $this->bookRepository = $bookRepository;
    }

    public function getAllByBook($book_id)
    {
        return $this->repository->findMany([['book_id', $book_id]]);
    }

    public function getDataForPlayListByBook($book_id)
    {
        $playlists = [];
        $chapters = $this->repository->findMany([['book_id', $book_id]]);
        foreach($chapters as $chapter){
            array_push($playlists, [
                'name' => $chapter->title,
                'singer' => 'Subiakto Priosoedarsono',
                'path' => asset($chapter->audio),
                'image' => asset('storage/bisabikinbrand.jpg'),
            ]);
        }

        return $playlists;
    }

    public function getPlaylist($book_id)
    {
        $playlists = [];
        $chapters = collect();
        $orders = $this->orderService->getSuccessOrderByUser(auth()->id());


        $productIds = [];

        foreach($orders as $order){
            foreach($order->orderDetails as $orderDetail){
                array_push($productIds, $orderDetail->product_id);
            }
        }

        foreach($productIds as $productId){
            $datas = $this->repository->findMany([['book_id', $book_id], ['product_id', $productId]]);
            foreach($datas as $data){
                $chapters->push($data);
            }
        }

        foreach($chapters as $chapter){
            array_push($playlists, [
                'name' => $chapter->title,
                'singer' => 'Subiakto Priosoedarsono',
                'path' => asset($chapter->audio),
                'image' => asset('storage/bisabikinbrand.jpg'),
            ]);
        }

        return $playlists;
    }

    public function storeBulkChapters(array $validatedData)
    {
        $chapterName = [];
        $book = $this->bookRepository->find($validatedData['book_id']);

        $currentChapters = $this->repository->getOrderedChapterDependOnBookId($book->id, false);
        
       
        $currentChaptersKey = 0;
        $latestChapter = 0;
        if(isset($currentChapters[0])){
            $explode = explode(' ' , $currentChapters[0]->title);
            $latestChapter = explode('.' , implode('.' , $explode))[1];

            $currentChaptersKey = $currentChapters[0]->order_position;
        }      

        $validData = [];
        $fileNames = [];

        $slug = Str::slug($book->title);
        $path = 'storage/' . $slug;
        foreach ($validatedData['chapters'] as $key => $data) {
        
            $explode = explode('.' , $data['audio']->getClientOriginalName());
            $fileName = 'chapter-' . $latestChapter+1 . '.' . end($explode);

            // aku menyesuaikan dengan format databasenya
            $fileNames[$fileName] = $data['audio'];
            $fullPath = $path . '/' . $fileName;

            $validData[] = [
                'title' => $chapterName[] = 'Chapter ' . $latestChapter+1 . '. ' . $data['title'],
                'audio' => $fullPath,
                'book_id' => $book->id,
                'order_position' => $currentChaptersKey+1,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $currentChaptersKey++;
            $latestChapter++;

        }

          $isChapterExists = $this->repository->getChaptersExistsDependOnBookId($book->id, array_column($validData , 'title'));
        
          if(!$isChapterExists->isEmpty()){
              return false;
          }

          //jika tidak ada duplicate baru store audio ke storage
          foreach ($fileNames as $key => $fileName) {
            $fileName->storeAs($slug , $key);
          }
    
        $data = $this->repository->storeBulkChapters($validData);
        return $data;
    }


    public function getOnlyUnAssignedProduct(int $bookId)
    {
        $chapters = $this->repository->findMany([['book_id' , $bookId], ['product_id' , null]]);

        return $chapters;
    }


    public function assignProductToChapter(array $assignedChapter, int $productId)
    {
        $chapters = $this->repository->assignProductToChapter($assignedChapter , $productId);

        return $chapters;
    }

    public function unAssignChapterToProduct(array $chapters)
    {
        $chapter = $this->repository->unAssignChapterToProduct($chapters);

        return $chapter;
    }

}