<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;

class Category extends Model
{
    public $timestamps=false;

    protected $table='category';
    protected $primary_key='id';

    protected $fillable=[
        'name',
        'status',
    ];
    public function book(){
        return $this->hasMany(Book::class);
    }
}
