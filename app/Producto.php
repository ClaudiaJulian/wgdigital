<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Producto;

class Producto extends Model
{
    protected $guarded = [];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    public function forma(){
        return $this->belongsTo(Forma::class,'form','id');
    }

    public function estampado(){
        return $this->belongsTo(Estampado::class,'printed','id');
    }

    public function color(){
        return $this->belongsTo(Color::class,'colored','id');
    }

    public function largo(){
        return $this->belongsTo(Largo::class,'length','id');
    }

    public function wardrobe(){
        return $this->belongsTo(Wardrobe::class,'tipo_w','id');
    }
}
