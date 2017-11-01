<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FName', 'LName', 'Address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function prepVouchers(){
        return $this->hasMany('App\Voucher','PrepBy','EmpID');
    }

    public function authVouchers(){
        return $this->hasMany('App\Voucher','AuthBy','EmpID');
    }
}
