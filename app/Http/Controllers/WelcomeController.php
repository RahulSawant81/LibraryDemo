<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;
use Library\Models\Book;

class WelcomeController extends Controller
{

    public function getBooksForHomePage(Request $request){

        $books = Book::paginate(3);

        if($books->count()){

            foreach($books->items() as $book){

                $books_arr[] = [
                    'id' => $book->id,
                    'name' => $book->name,
                    'author' => $book->author->name,
                    'category' => $book->bookCategory->name,
                    'price' => $book->price
                ];
            }

        }

        return response()->json(['books' => $books_arr, 'items' => $books]);
    }

    public function searchBooks(Request $request){

        $search_key = e($request->get('key'));

        $books = Book::where('name', 'like', '%'.$search_key.'%')->paginate(3);

        $books->appends(['key' => $search_key])->links();

        if($books->count()){

            foreach($books->items() as $book){

                $books_arr[] = [
                    'id' => $book->id,
                    'name' => $book->name,
                    'author' => $book->author->name,
                    'category' => $book->bookCategory->name,
                    'price' => $book->price
                ];
            }

        }

        return response()->json(['books' => $books_arr, 'items' => $books]);
    }
}
