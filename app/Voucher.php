<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public function details(){
        return $this->hasMany('App\Detail','vNo','vNo');
    }

    public function account(){
        return $this->belongsTo('App\Account','accCode','Code');
    }

    public function prepBy(){
        return $this->belongsTo('App\Employee','PrepBy','EmpID');
    }

    public function authBy(){
        return $this->belongsTo('App\Employee','AuthBy','EmpID');
    }
}
