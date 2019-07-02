<?php

namespace App\ModelsUser;

use Illuminate\Database\Eloquent\Model;

class Level_LanguageInformation extends Model
{
    protected  $table = 'languages_lists';
    protected $fillable = [
        'language_id','language_level_id','user_id'

    ];
    public function users(){
        return $this->belongsTo('\App\User' ,'user_id');
    }
}
