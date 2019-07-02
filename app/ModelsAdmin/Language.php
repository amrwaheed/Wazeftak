<?php

namespace App\ModelsAdmin;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table='languages';

    protected $fillable = [
        'language_name',
    ];
    public function languages(){
        return $this->belongsToMany('\App\ModelsAdmin\Language_Level' , 'languages_lists','language_level_id','language_id');
    }
}
