<?php

namespace Library\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    protected $fillable = [
        'name',
        'description'
    ];

    public $timestamps = true;

    public function books(){
        return $this->hasMany('Library\Models\Book', 'author_id', 'id');
    }
}
