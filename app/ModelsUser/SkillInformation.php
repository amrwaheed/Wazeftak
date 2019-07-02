<?php

namespace App\ModelsUser;

use Illuminate\Database\Eloquent\Model;

class SkillInformation extends Model
{
    protected  $table = 'skills';
    protected $fillable = [
        'skill_name','user_id'

    ];
    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }
}
