<?php

namespace App\ModelsAdmin;

use Illuminate\Database\Eloquent\Model;

class Language_Level extends Model
{
    protected $table='language_levels';

    protected $fillable = [
        'language_level_name',
    ];

    public function language_level(){
        return $this->belongsToMany('\App\ModelsAdmin\Language' , 'languages_lists','language_id','language_level_id');
    }
}
