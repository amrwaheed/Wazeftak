<?php

namespace App\ModelsAdmin;

use App\ModelsUser\PersonalInformation;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';

    protected $fillable = [
        'country_name','nicename','phonecode'
    ];

    public function personalinformation(){
        return $this->belongsTo('\App\ModelsUser\PersonalInformation' , 'country_id');
    }
}
