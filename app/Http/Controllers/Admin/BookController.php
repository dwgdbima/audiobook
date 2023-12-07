<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Service\BookServiceInterface;
use App\Contract\Service\ChapterServiceInterface;
use App\Contract\Service\ProductServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssignChapterRequest;
use App\Http\Requests\AssignChapterToProductRequest;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\ProductChapterUpdateRequest;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Requests\UpdateBookRequestAdmin;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class BookController extends Controller
{
    protected $bookServiceInterface;
    protected $chapterServiceInterface;
    protected $productServiceInterface;

    public function __construct(BookServiceInterface $bookServiceInterface, ChapterServiceInterface $chapterServiceInterface, ProductServiceInterface $productServiceInterface)
    {
        $this->bookServiceInterface = $bookServiceInterface;
        $this->chapterServiceInterface = $chapterServiceInterface;
        $this->productServiceInterface = $productServiceInterface;
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


    public function createProductView()
    {
        
        return view('web.admin.pages.create-product' , [
            'books' => $this->bookServiceInterface->getAllBook()
        ]);
    }


    public function assignChapterToProductView()
    {
        
        return view('web.admin.pages.assign-chapter-to-product' , [
            'products' => $this->productServiceInterface->getAllProduct()
        ]);
    }

    public function manageBookView(Book $book)
    {   
        
        $unAssignedChapter = $book->load(['chapters' => function($query) {
            $query->where('product_id' , null);
        }]);

        return view('web.admin.pages.manage-book' , [
            'book' => $book->load(['products.chapters']),
            'idle_chapters' => $unAssignedChapter
        ]);
    }


    public function updateBook(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validated();
       
        $this->bookServiceInterface->updateBook($book, $validatedData);
        Alert::success('Berhasil' , 'Buku Berhasil Diperbarui');
        return back();
    }


    public function updateBookAdmin(UpdateBookRequestAdmin $request , Book $book)
    {
        $validatedData = $request->validated();
        
        $this->bookServiceInterface->updateBookAdmin($book, $validatedData);
        Alert::success('Berhasil' , 'Buku Berhasil Diperbarui');
        return back();
    }


    public function updateProductChapter(ProductChapterUpdateRequest $request)
    {
        $validatedData = $request->validated();
        
        DB::transaction(function () use( $validatedData) {
            foreach ($validatedData['products'] as $key => $data) {
                //update Product
                $data['book_id'] = $validatedData['book_id'];
    
                $this->productServiceInterface->updateProductDependOnBook($data);
 
                if(isset($data['unselect_chapters'])){
                    $this->chapterServiceInterface->unAssignChapterToProduct($data['unselect_chapters']);
                }  
    
            }
        }, 2);

        Alert::success('Berhasil' , 'Berhasil Update Product & Chapters');
        return back();
    }

    public function assignChapter(AssignChapterRequest $request)
    {
        $validatedData = $request->validated();
       $result = $this->chapterServiceInterface->storeBulkChapters($validatedData);
       
        switch ($result) {
            case true:
                Alert::success('Berhasil' , 'Chapters Berhasil Diupload');
                return back();
                break;
            case false:
                Alert::info('Duplicate' , 'Terdapat Judul Chapter Duplikasi');
                return back();
            default:
                Alert::error('Terjadi Kesalahan' , 'Silahkan Hubungi Developer');
                return back();
                break;
        }


    }

    public function storeProducts(StoreProductsRequest $request)
    {
        $validatedData = $request->validated();

        foreach($validatedData['products'] as $key => &$product){
                $product['book_id'] = $validatedData['book_id'];
                $product['created_at'] = now();
                $product['updated_at'] = now();
        }

       
       $result = $this->productServiceInterface->storeBulkProduct($validatedData['products']);

       switch ($result) {
        case true:
            Alert::success('Berhasil' , 'Berhasil Menambah Product');
            return back();
            break;
        
        default:
            Alert::error('Terjadi Kesalahan' , 'Silahkan Hubungi Developer');
            return back();
            break;
       }
    }

    
    public function getRelatedChapter(Request $request)
    {
        $product = $this->productServiceInterface->findSingleProduct($request->product_id);
        $chapters = $this->chapterServiceInterface->getOnlyUnAssignedProduct($product->book_id);

        return $chapters;
    }


    public function assignChapterToProduct(AssignChapterToProductRequest $request)
    {
        $validatedData = $request->validated();

        $result = $this->chapterServiceInterface->assignProductToChapter($validatedData['selected_chapters'] , $validatedData['related_book']);

        switch ($result) {
            case true:
                Alert::success('Berhasil' , 'Berhasil Assign Chapters');
                return back();
                break;
            
            default:
                Alert::error('Terjadi Kesalahan' , 'Silahkan Hubungi Developer');
                return back();
                break;
           }
    }

    
}
