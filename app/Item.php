<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Item extends Model
{
    protected $guarded = [];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function guardarropa(){
        return $this->belongsToMany(Guardarropa::class,'guardarropa_item','item_id','guardarropa_id');
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
