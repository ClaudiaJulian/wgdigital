<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Item;
use App\Producto;

class Forma extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->hasMany(Item::class, 'form','id');
    }
    
    public function producto(){
        return $this->hasMany(Producto::class, 'form','id');
    }
}
