<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Abono;

class User extends Authenticatable
{
    use Notifiable;

   
    protected $fillable = [
        'name', 'email', 'password','abono'
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $guarded=[];

    protected $with=['abono'];

    public function abono(){
        return $this->belongsTo(Abono::class,'abono','id');
    }

}
