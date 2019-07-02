<?php

namespace App;

use App\ModelsUser\CourseInformation;
use App\ModelsUser\Employementinformation;
use App\ModelsUser\Experienceinformation;
use App\ModelsUser\Level_LanguageInformation;
use App\ModelsUser\PersonalInformation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isAdmin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function personalinformation(){
        return $this->hasOne('\App\ModelsUser\PersonalInformation' , 'user_id');
    }
    public function employement(){
        return $this->hasOne('\App\ModelsUser\Employementinformation' ,'user_id');
    }
    public function experience(){
        return $this->hasMany('\App\ModelsUser\Experienceinformation' , 'user_id');
    }

    public function school(){
        return $this->hasOne('\App\ModelsUser\EducationInformation' , 'user_id');
    }

    public function course(){
        return $this->hasMany('\App\ModelsUser\CourseInformation' , 'user_id');
    }

    public function skills(){
        return $this->hasMany('\App\ModelsUser\SkillInformation' , 'user_id');
    }

    public function language_list(){
        return $this->hasMany('\App\ModelsUser\Level_LanguageInformation'  ,'user_id');
    }
    public function online(){
        return $this->hasOne('\App\ModelsUser\OnlinePersence'  ,'user_id');
    }

    public function certification(){
        return $this->hasMany('\App\ModelsUser\CertifationInformation'  ,'user_id');
    }
}
