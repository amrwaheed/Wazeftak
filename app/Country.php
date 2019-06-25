<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function touch(){
        return $this->hasMany('\App\Touches' , 'country');
    }

}
