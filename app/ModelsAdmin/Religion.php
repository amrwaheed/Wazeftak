<?php

namespace App\ModelsAdmin;

use App\ModelsUser\PersonalInformation;
use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $table='religions';

    protected $fillable = [
        'religion_name',
    ];

    public function personalinformation(){
        return $this->belongsTo('\App\ModelsUser\PersonalInformation' , 'religion_id');
    }

}
