<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Get the state that has the city.
     */
    public function state()
    {
        return $this->belongsTo('App\State');
    }

    /**
     * Get the infections of the city.
     */
    public function infections()
    {
        return $this->hasMany('App\Infection');
    }
}
