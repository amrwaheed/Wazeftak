<?php

namespace App\ModelsUser;

use Illuminate\Database\Eloquent\Model;

class CertifationInformation extends Model
{
    protected $table = "certifations";
    protected $fillable = [
        'certification_url','user_id'

    ];

    public function users(){
        return $this->belongsTo('\App\User' , 'user_id');
    }
}
