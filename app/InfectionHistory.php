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

    /**
     * Get the contributors of the infection history.
     */
    public function contributor()
    {
        return $this->belongsTo('App\Contributor');
    }
}
