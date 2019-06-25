<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Touches extends Model
{
    protected $table = 'touches';
    protected $fillable = [
        'fullname','email','country','phone','typeproject','nameproject','description','server','message'

    ];
    public function countryy(){
        return $this->belongsTo('\App\Country' , 'country');
    }


}
