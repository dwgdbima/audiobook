<?php

namespace App\Services;

use App\Contract\Repository\ChapterRepositoryInterface;
use App\Contract\Service\ChapterServiceInterface;
use App\Contract\Service\OrderServiceInterface;

class ChapterService extends BaseService implements ChapterServiceInterface
{
    // protected $repository = \App\Repositories\ChapterRepository::class;
    protected $orderService;

    public function __construct(ChapterRepositoryInterface $chapterRepositoryInterface, OrderServiceInterface $orderServiceInterface)
    {
        $this->repository = $chapterRepositoryInterface;
        $this->orderService = $orderServiceInterface;
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
}