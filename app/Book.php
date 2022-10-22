<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Author;
use App\detailOrder;

class Book extends Model
{
    //
    public $timestamps=false;

    protected $table='book';
    protected $primary_key='id';

    protected $fillable=[
        'name',
        'description',
        'price',
        'image',
        'quality',
        'status',
        'category_id',
        'author_id'
        
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function detail(){
        return $this->hasMany(detailOrder::class);
    }
}
