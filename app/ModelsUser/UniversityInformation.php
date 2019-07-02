<?php

namespace App\ModelsUser;

use App\ModelsAdmin\Degree;
use App\ModelsAdmin\Grade;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UniversityInformation extends Model
{
    protected $table = "universities";
    protected $fillable = [
        'university_name','fields_study','endyear','degree_id'
        ,'grade_id','user_id'
    ];

    public function degrees(){
        return $this->belongsTo('\App\ModelsAdmin\Degree' , 'degree_id');
    }
    public function grades(){
        return $this->belongsTo('\App\ModelsAdmin\Grade' , 'grade_id');
    }
    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }
}
