<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Author extends Model
{
    //
    public $timestamps=false;

    protected $table='author';
    protected $primary_key='id';

    protected $fillable=[
        'name',
        'description',
        'status',
    ];

    public function book(){
        return $this->hasMany(Book::class);
    }
    
}
