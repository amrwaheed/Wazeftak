<?php

namespace App\ModelsAdmin;

use App\ModelsUser\Employementinformation;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table='positions';

    protected $fillable = [
        'position_name',
    ];

    public function employement(){
        return $this->hasOne(Employementinformation::class);
    }


}
