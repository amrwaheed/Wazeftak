<?php

namespace App\ModelsAdmin;

use App\ModelsUser\Employementinformation;
use Illuminate\Database\Eloquent\Model;

class Scientific_Level extends Model
{
    protected $table='scientific_levels';

    protected $fillable = [
        'scientific_name',
    ];

    public function employement(){
        return $this->hasOne('\App\ModelsUser\Employementinformation' , 'scientific_id');
    }
}
