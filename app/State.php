<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * Get the cities for the state.
     */
    public function cities()
    {
        return $this->hasMany('App\City');
    }
}
