<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Guardarropa extends Model
{
    protected $guarded =[];

    public function item(){     
        return $this->belongsToMany(Item::class,'guardarropa_item','guardarropa_id','item_id');
    }
}
