<?php

namespace App\ModelsAdmin;

use App\ModelsUser\PersonalInformation;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $table='nationalities';

    protected $fillable = [
        'nationality_enName','nationality_enNationality'
    ];
    public function personalinformation(){
        return $this->belongsTo('\App\ModelsUser\PersonalInformation' , 'nationality_id');
    }
}
