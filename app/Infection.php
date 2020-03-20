<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infection extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'first_case',
    ];

    /**
     * Get the city of the infection count.
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * Get the contributors of the infection count.
     */
    public function contributor()
    {
        return $this->belongsTo('App\Contributor');
    }

    /**
     * Get the histories of the infection count.
     */
    public function histories()
    {
        return $this->belongsToMany('App\InfectionHistory');
    }
}
