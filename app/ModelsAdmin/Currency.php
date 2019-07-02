<?php

namespace App\ModelsAdmin;

use App\ModelsUser\Employementinformation;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table='currencies';

    protected $fillable = [
        'currency_name',
    ];


    public function employement(){
        return $this->hasOne('App\ModelsUser\Employementinformation' , 'currancy_id');
    }

}
