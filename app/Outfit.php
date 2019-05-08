<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Shareable;
use App\Traits\Sample;

class Outfit extends Model
{
    use Shareable;
    use Sample;

    protected $guarded = [];

    protected $shareOptions = [
        'columns' => [
            'title' => 't_id'
        ],
        'url' => null
    ];

    public function getUrlAttribute()
    {
        return route('outfit.index',$this->slug);
    }



}
