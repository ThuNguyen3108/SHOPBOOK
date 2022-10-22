<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    public $timestamps=false;

    protected $table='admin';
    protected $primary_key='id';

    protected $fillable=[
        'username',
        'email',
        'password',
    ];
    
}
