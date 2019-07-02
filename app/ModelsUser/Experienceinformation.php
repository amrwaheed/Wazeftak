<?php

namespace App\ModelsUser;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Experienceinformation extends Model
{
    protected  $table = 'experiences';
    protected $fillable = [
        'company_name','job_title','date_start', 'date_end', 'salary','reasonforleaving',
        'user_id'

    ];
    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }
}
