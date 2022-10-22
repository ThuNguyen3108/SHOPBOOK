<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Order;

class detailOrder extends Model
{
    //
    public $timestamps=false;

    protected $table='detail_order';
    protected $primary_key='id';

    protected $fillable=[
        'id_order',
        'id_book',
        'quality',
        'total',
        'price',
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
