<?php

namespace App\ModelsUser;
use App\User;
use Illuminate\Database\Eloquent\Model;

class CourseInformation extends Model
{
    protected  $table = 'courses';
    protected $fillable = [
        'course_name','organization_name','start_date','end_date','user_id'

    ];
    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }
}
