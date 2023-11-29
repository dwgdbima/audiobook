<?php

namespace App\Services;

use App\Contract\Repository\ChapterRepositoryInterface;
use App\Contract\Service\ChapterServiceInterface;
use App\Contract\Service\OrderServiceInterface;
use App\Models\Chapter;
use App\Repositories\BookRepository;
use Exception;
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
        try {
            $chapterName = [];
            $book = $this->bookRepository->find($validatedData['book_id']);
            $currentChapters = Chapter::where('book_id' , $book->id)->latest()->first();

            $currentChaptersKey = 0;
            if($currentChapters){
                $explode = explode(' ' , $currentChapters->title);
                $currentChaptersKey = explode('.' , implode('.' , $explode))[1];
            }

            foreach($validatedData['chapters'] as $key => $data){
                $chapterName[] = 'Chapter ' . $currentChaptersKey+1 . '. ' . $data['title'];
            }
            
           
            //masih belum paham menggunakan where queryable
            $isChapterExists = Chapter::where('book_id' , $book->id)->whereIn('title' , $chapterName)->get();
            
            if(!$isChapterExists->isEmpty()){
                return false;
            }

            $validData = [];
            $slug = Str::slug($book->title);
            $path = 'storage/' . $slug;
            foreach ($validatedData['chapters'] as $key => $data) {
                $explode = explode('.' , $data['audio']->getClientOriginalName());
                $fileName = 'chapter-' . $currentChaptersKey+1 . '.' . end($explode);
            
                // aku menyesuaikan dengan format databasenya
                $data['audio']->storeAs($slug , $fileName);
                $fullPath = $path . '/' . $fileName;

                $validData[] = [
                    'title' => $chapterName[] = 'Chapter ' . $currentChaptersKey+1 . '. ' . $data['title'],
                    'audio' => $fullPath,
                    'book_id' => $book->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];


            }
        
            $data = $this->repository->storeBulkChapters($validData);
            return $data;
        } catch (Exception $e) {
            return $e;
        }
    }
}