<?php

namespace App\ModelsAdmin;

use App\ModelsUser\UniversityInformation;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table='grades';

    protected $fillable = [
        'grade_name',
    ];
    public function university(){
        return $this->hasOne('\App\ModelsUser\UniversityInformation' , 'grade_id');
    }
}
