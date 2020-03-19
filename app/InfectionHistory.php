<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfectionHistory extends Model
{
    /**
     * Get the infection that history belongs to.
     */
    public function infection()
    {
        return $this->belongsTo('App\Infection');
    }
}
