<?php

namespace App\ModelsUser;

use Illuminate\Database\Eloquent\Model;

class OnlinePersence extends Model
{
    protected $table = "online_presences";
    protected $fillable = [
        'linkedin','facebook','behance', 'instgram', 'github','stack_overview',
        'youtube','blog','website','others' ,'user_id'

    ];

    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }
}
