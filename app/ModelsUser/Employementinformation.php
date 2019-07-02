<?php

namespace App\ModelsUser;

use App\ModelsAdmin\Currency;
use App\ModelsAdmin\Degree;
use App\ModelsAdmin\Position;
use App\ModelsAdmin\Scientific_Level;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Employementinformation extends Model
{
    protected  $table = 'employementinformations';
    protected $fillable = [
        'salary','smoke','license_drive', 'youafterfive', '	position_id','degree_id',
        'currancy_id','user_id'

    ];
    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }
    public function scientific_level(){
        return $this->belongsTo('\App\ModelsAdmin\Scientific_Level','scientific_id');
    }
    public function currency(){
        return $this->belongsTo(Currency::class);
    }





}
