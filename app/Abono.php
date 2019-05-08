<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Abono;
use App\User;
use Auth;


class Abono extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->hasMany(User::class, 'abono','id');
    }
}
