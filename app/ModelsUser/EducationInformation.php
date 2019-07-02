<?php

namespace App\ModelsUser;

use Illuminate\Database\Eloquent\Model;

class EducationInformation extends Model
{
    protected  $table = 'schools';
    protected $fillable = [
        'high_school','gradatesyear','user_id'

    ];
    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }

}
