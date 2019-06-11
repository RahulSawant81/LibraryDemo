<?php

namespace Library\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table = 'book_categories';

    protected $fillable = [
        'name'
    ];

    public $timestamps = true;

    public function books(){
        return $this->hasMany('Library\Models\Book', 'cat_id', 'id');
    }
}
