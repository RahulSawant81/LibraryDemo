<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Library\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->is_admin){
            return redirect('admin');
        }

        $books = Book::all();

        if($books->count()){

            foreach($books as $book){

                $books_arr[] = [
                    'id' => $book->id,
                    'name' => $book->name,
                    'author' => $book->author->name,
                    'category' => $book->bookCategory->name,
                    'price' => $book->price,
                    'desc' => $book->description
                ];
            }
        }
        return view('home', ['books' => $books_arr]);
    }


}
