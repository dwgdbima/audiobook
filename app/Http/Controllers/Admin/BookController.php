<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\ChapterServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssignChapterRequest;
use App\Http\Requests\CreateBookRequest;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BookController extends Controller
{
    protected $bookServiceInterface;
    protected $chapterServiceInterface;

    public function __construct(BookServiceInterface $bookServiceInterface, ChapterServiceInterface $chapterServiceInterface)
    {
        $this->bookServiceInterface = $bookServiceInterface;
        $this->chapterServiceInterface = $chapterServiceInterface;
    }

    public function createBookView()
    {
        return view('web.admin.pages.create-book');
    }

    public function storeBook(CreateBookRequest $request)
    {
        $validatedData = $request->validated();
        
        $this->bookServiceInterface->storeBook($validatedData);
        Alert::success('Berhasil' , 'Berhasil Memposting Buku Baru');
        return back();
    }

    public function assignChapterView()
    {
        
        return view('web.admin.pages.assign-chapter' , [
            'books' => $this->bookServiceInterface->getAllBook()
        ]);
    }

    public function assignChapter(AssignChapterRequest $request)
    {
        $validatedData = $request->validated();
       $result = $this->chapterServiceInterface->storeBulkChapters($validatedData);
       
        if($result){
          
            Alert::success('Berhasil' , 'Chapters Berhasil Diupload');
            return back();
        }else{
            Alert::info('Duplicate' , 'Terdapat Judul Chapter Duplikasi');
            return back();
        }

    }
    
}
