<?php

namespace App\Http\Controllers\Customer;

use App\Contract\Service\ChapterServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    protected $chapterService;

    public function __construct(ChapterServiceInterface $chapterServiceInterface)
    {
        $this->chapterService = $chapterServiceInterface;
    }

    public function show(Request $request, $book_id)
    {
        // if($request->wantsJson()){
        //     return response()->json($this->chapterService->getAllByBook($book_id), 200);
        // }
        return view('web.customer.playlist.show', ['chapters' => $this->chapterService->getPlaylist($book_id)]);
    }
}
