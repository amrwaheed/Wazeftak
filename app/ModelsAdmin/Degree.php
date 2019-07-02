<?php

namespace App\ModelsAdmin;

use App\ModelsUser\Employementinformation;
use App\ModelsUser\UniversityInformation;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $table='degrees';

    protected $fillable = [
        'degree_name',
    ];
    public function university(){
        return $this->belongsTo('\App\ModelsUser\UniversityInformation' , 'degree_id');
    }
 /*   public function education(){
        return $this->hasOne('\App\ModelsUser\EducationInformation' , 'degree_id');
    }*/


}
