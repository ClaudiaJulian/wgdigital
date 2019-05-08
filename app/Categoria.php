<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\item;
use App\producto;

class Categoria extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->hasMany(Item::class);
    }
    public function producto(){
        return $this->hasMany(Producto::class);
    }
}
