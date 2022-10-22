<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Order;

class Address extends Model
{
    //
    public $timestamps=false;

    protected $table='address';
    protected $primary_key='id';

    protected $fillable=[
        'name_address',
        'id_customer',
    ];
    public function customer(){
        // do address co chua khoa ngoai voi customer cho nen ta chi can them id_customer
        return $this->belongsTo(Customer::class,'id_customer');
    }
    public function order(){
        return $this->hasMany(Order::class,'id_address','id');
    }
    
    
}
