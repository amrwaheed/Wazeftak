<?php

namespace App\ModelsUser;

use App\ModelsAdmin\Country;
use App\ModelsAdmin\Nationality;
use App\ModelsAdmin\Religion;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $table = "personal_informaions";
    protected $fillable = [
        'personal_name','birthday','address', 'email', 'civil_id_number','telephone',
        'mobile','gender','martial_status','city_name','image_name',
        'nationality_id', 'country_id','religion_id'  ,'user_id'

    ];

    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }

    public function religion(){
        return $this->hasMany('\App\ModelsAdmin\Religion' , 'religion_id');
    }

    public function country(){
        return $this->hasMany('\App\ModelsAdmin\Country' , 'country_id');
    }
    public function nationality(){
        return $this->hasMany('\App\ModelsAdmin\Nationality' , 'nationality_id');
    }


}
