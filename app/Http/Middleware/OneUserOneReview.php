<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use App\Models\Review;
use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OneUserOneReview
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->hasRole('customer')){
            $isExists = Review::where('user_id' , auth()->user()->id)
            ->where('book_id' , $request->book)
            ->first();
        }else{
            $isExists = Comment::where('user_id' , auth()->user()->id)
            ->where('review_id' , $request->review_id)
            ->first();
        }

        if($isExists){
            Alert::info('Oops', 'Kamu sudah membuat komentar');
            return back();
        }

        return $next($request);
    }
}
