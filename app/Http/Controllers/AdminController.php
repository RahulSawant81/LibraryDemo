<?php

namespace Library\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Library\Models\Author;
use Library\Models\Book;
use Library\Models\BookCategory;

class AdminController extends Controller
{
    public function index(){

        $authors_count = Author::count();

        $cats_count = BookCategory::count();

        $books_count = Book::count();

        return view('admin.home', ['authors_count' => $authors_count,
             'cats_count' => $cats_count, 'books_count' => $books_count]);
    }

    //Author...
    public function getAuthors(){

        $authors = Author::all();

        return view('admin.authors', ['authors' => $authors]);
    }

    public function getAddAuthor(){

        return view('admin.add-author');
    }

    public function addAuthor(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

        $name = e($request->get('name'));
        $desc = e($request->get('desc'));

        Author::create([
            'name' => $name,
            'description' => $desc
        ]);

        return redirect('admin/authors')->with('success','Author created successfully!');

    }

    public function getEditAuthor(Request $request, $author_id){

        $author = Author::find($author_id);

        if($author === null){
            return redirect('admin/authors')->with('error', 'Author not found.');
        } else {

            $author_arr = [
                'id' => $author->id,
                'name' => $author->name,
                'desc' => $author->description
            ];

            return view('admin.edit-author', ['author' => $author_arr]);
        }
    }

    public function updateAuthor(Request $request){

        $author_id = e($request->get('author'));

        $author = Author::find($author_id);

        if($author === null){
            return redirect('admin/authors')->with('error', 'Author not found.');
        } else {

            $request->validate([
                'name' => 'required'
            ]);

            $name = e($request->get('name'));
            $desc = e($request->get('desc'));

            $author->name = $name;
            $author->description = $desc;
            $author->save();

            return redirect('admin/authors')->with('success','Author updated successfully!');
        }
    }

    public function deleteAuthor(Request $request, $author_id){

        $author = Author::find($author_id);

        if($author === null){

            return redirect('admin/authors')->with('error', 'Author not found.');
        } else {

            $author->delete();

            return redirect('admin/authors')->with('success', 'Author deleted successfully.');
        }
    }

    //Categories...
    public function getCategories(){

        $cats = BookCategory::all();

        return view('admin.cats', ['cats' => $cats]);
    }

    public function getAddCategory(){
        return view('admin.add-cat');
    }

    public function addCategory(Request $request){

        $request->validate([
            'name' => 'required|unique:book_categories'
        ]);

        $name = e($request->get('name'));

        BookCategory::create([
            'name' => $name
        ]);

        return redirect('admin/categories')->with('success','Category created successfully!');
    }

    public function getEditBookCategory(Request $request, $cat_id){

        $cat = BookCategory::find($cat_id);

        if($cat === null){
            return redirect('admin/categories')->with('error', 'Category not found.');
        } else {

            $cat_arr = [
                'id' => $cat->id,
                'name' => $cat->name
            ];

            return view('admin.edit-cat', ['cat' => $cat_arr]);
        }
    }

    public function updateBookCategory(Request $request){

        $cat_id = e($request->get('cat'));

        $cat = BookCategory::find($cat_id);

        if($cat === null){
            return redirect('admin/book-cats')->with('error', 'Category not found.');
        } else {

            $request->validate([
                'name' => 'required|unique:book_categories'
            ]);

            $name = e($request->get('name'));

            $cat->name = $name;
            $cat->save();

            return redirect('admin/categories')->with('success','Category updated successfully!');
        }
    }

    public function deleteBookCategory(Request $request, $cat_id){
        $cat = BookCategory::find($cat_id);

        if($cat === null){

            return redirect('admin/categories')->with('error', 'Category not found.');
        } else {

            $cat->delete();

            return redirect('admin/categories')->with('success', 'Category deleted successfully.');
        }
    }

    //Books...
    public function getBooks(){

        $books_arr = [];

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

        return view('admin.books', ['books' => $books_arr]);
    }

    public function getAddBook(){

        $authors = Author::all();

        $cats = BookCategory::all();

        return view('admin.add-book', ['cats' => $cats, 'authors' => $authors]);
    }

    public function addBook(Request $request){

        $request->validate([
            'author' => 'required',
            'category' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);

        $author_id = e($request->get('author'));
        $cat_id = e($request->get('category'));
        $name = e($request->get('name'));
        $desc = e($request->get('desc'));
        $price = e($request->get('price'));

        Book::create([
            'author_id' => $author_id,
            'cat_id' => $cat_id,
            'name' => $name,
            'description' => $desc,
            'price' => $price
        ]);

        return redirect('admin/books');
    }

    public function getEditBook(Request $request, $book_id){

        $book = Book::find($book_id);
        if($book === null){
            return redirect('admin/books');
        } else {
            $book_arr = [
                'id' => $book->id,
                'name' => $book->name,
                'author' => $book->author_id,
                'cat' => $book->cat_id,
                'price' => $book->price,
                'desc' => e($book->description)
            ];

            $authors = Author::all();

            $cats = BookCategory::all();

            return view('admin.edit-book', ['book' => $book_arr, 'authors' => $authors,
                'cats' => $cats]);
        }
    }

    public function updateBook(Request $request){

        $request->validate([
            'author' => 'required',
            'category' => 'required',
            'name' => 'required',
            'price' => 'required'
        ]);

        $book_id = e($request->get('book'));

        $book = Book::find($book_id);

        if($book === null){

            return redirect('admin/books')->with('error', 'Book not found.');
        } else {

            $author_id = e($request->get('author'));
            $cat_id = e($request->get('category'));
            $name = e($request->get('name'));
            $desc = e($request->get('desc'));
            $price = e($request->get('price'));

            $book->author_id = $author_id;
            $book->cat_id = $cat_id;
            $book->name = $name;
            $book->description = $desc;
            $book->price = $price;

            $book->save();

            return redirect('admin/books')->with('success', 'Book updated successfully.');
        }
    }

    public function deleteBook(Request $request, $book_id){

        $book = Book::find($book_id);

        if($book === null){

            return redirect('admin/books')->with('error', 'Book not found.');
        } else {

            $book->delete();

            return redirect('admin/books')->with('success', 'Book deleted successfully.');
        }
    }
}
