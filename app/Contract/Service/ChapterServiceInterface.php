<?php

namespace App\Contract\Service;

interface ChapterServiceInterface extends BaseServiceInterface
{
    public function getAllByBook($book_id);

    public function getDataForPlayListByBook($book_id);

    public function getPlaylist($book_id);
}