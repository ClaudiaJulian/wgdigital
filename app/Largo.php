<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Largo;

class Largo extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->hasMany(Item::class, 'length','id');
    }

    public function producto(){
        return $this->hasMany(Producto::class, 'length','id');
    }
    
}
