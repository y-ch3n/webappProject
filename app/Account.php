<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function accounttype(){
        return $this->belongsTo('App\Accounttype','Type','CatID');
    }

    public function vouchers(){
        return $this->hasMany('App\Voucher','accCode','Code');
    }

    public function details(){
        return $this->hasMany('App\Detail','Code','Code');
    }
}
