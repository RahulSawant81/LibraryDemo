<?php

namespace Library\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'author_id',
        'cat_id',
        'name',
        'description',
        'price'
    ];

    public $timestamps = true;

    public function author(){
        return $this->belongsTo('Library\Models\Author', 'author_id', 'id');
    }

    public function bookCategory(){
        return $this->belongsTo('Library\Models\BookCategory', 'cat_id', 'id');
    }

}
