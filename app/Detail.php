<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public function voucher(){
        return $this->belongsTo('App\Voucher','vNo','vNo');
    }

    public function account(){
        return $this->belongsTo('App\Account','Code','Code');
    }
}
