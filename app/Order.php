<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;
use App\Address;

class Order extends Model
{


    protected $table='order';
    protected $primary_key='id';
    public $timestamps= true;

    protected $fillable=[
        'id_address',
        'id_customer',
        'total_money',
        'status',
        'created_at',
        'updated_at',
    ];
    public function customer(){
        // lay khoa chinh cua customer so voi id_customer cua bang Order
        return $this->belongsTo(Customer::class,'id_customer');
    }
    public function address(){
        return $this->belongsTo(Address::class,'id_address');
    }
    public function detail(){
        return $this->hasMany(detailOrder::class);
    }
}
