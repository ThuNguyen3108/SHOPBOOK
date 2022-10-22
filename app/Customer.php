<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;
use App\Order;

class Customer extends Model
{
        public $timestamps=false;
        protected $table='customer';
        protected $primary_key='id';
        protected $fillable=[
                'username',
                'email',
                'token',
                'phone'
        ];
        public function address(){
                return $this->hasMany(Address::class,'id_customer','id');
        }
        public function order(){
                // do bang customer khong co khoa ngoai voi order nen them khoa ngoai id_customer so sanh vs id trong bang customer
                return $this->hasMany(Order::class,'id_customer','id');
        }
}
