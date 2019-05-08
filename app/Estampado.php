<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Estampado;

class Estampado extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->hasMany(Item::class, 'printed','id');
    }

    public function producto(){
        return $this->hasMany(Producto::class, 'printed','id');
    }
}
