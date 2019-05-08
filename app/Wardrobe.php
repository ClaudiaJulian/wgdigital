<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wardrobe;

class Wardrobe extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->hasMany(Item::class, 'tipo_w','id');
    }

    public function producto(){
        return $this->hasMany(Producto::class, 'tipo_w','id');
    }
}
