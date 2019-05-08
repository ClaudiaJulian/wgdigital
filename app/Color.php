<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Color;

class Color extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->hasMany(Item::class, 'colored','id');
    }

    public function producto(){
        return $this->hasMany(Producto::class, 'colored','id');
    }

}
