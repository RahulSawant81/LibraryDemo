<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();


Route::get('/', function(){
    return view('welcome');
});

Route::get('/get/books', 'WelcomeController@getBooksForHomePage');

Route::get('/search/books', 'WelcomeController@searchBooks');

Route::group(['middleware' => ['auth']], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['admin']], function(){

        Route::get('/admin', 'AdminController@index');

        Route::get('/admin/authors', 'AdminController@getAuthors')->name('admin/authors');

        Route::get('/admin/add/author', 'AdminController@getAddAuthor');

        Route::post('/admin/add/author', 'AdminController@addAuthor');

        Route::get('/admin/edit/author/{author_id}', 'AdminController@getEditAuthor')->name('edit/author');

        Route::post('/admin/update/author', 'AdminController@updateAuthor')->name('update/author');

        Route::get('/admin/delete/author/{author}', 'AdminController@deleteAuthor')->name('delete/author');

        Route::get('/admin/categories', 'AdminController@getCategories')->name('admin/book-cats');

        Route::get('/admin/add/book-cat', 'AdminController@getAddCategory')->name('category');

        Route::post('/admin/add/book-cat', 'AdminController@addCategory')->name('add/book-cat');

        Route::get('/admin/edit/book-cat/{cat_id}', 'AdminController@getEditBookCategory')->name('edit/book-cat');

        Route::post('/admin/update/book-cat', 'AdminController@updateBookCategory')->name('update/book-cat');

        Route::get('/admin/delete/book-cat/{cat_id}', 'AdminController@deleteBookCategory')->name('delete/book-cat');

        Route::get('/admin/books', 'AdminController@getBooks')->name('admin/books');

        Route::get('/admin/add/book', 'AdminController@getAddBook')->name('book');

        Route::post('/admin/add/book', 'AdminController@addBook')->name('add/book');

        Route::get('/admin/edit/book/{book_id}', 'AdminController@getEditBook')->name('edit/book');

        Route::post('/admin/update/book', 'AdminController@updateBook')->name('update/book');

        Route::get('/admin/delete/book/{book_id}', 'AdminController@deleteBook')->name('delete/book');



    });

});
