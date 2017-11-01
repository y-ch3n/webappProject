<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounttype extends Model
{
    public function accounts(){
        return $this->hasMany('App\Account','Type','CatID');
    }
}
