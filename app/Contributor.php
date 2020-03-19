<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Infection;

class Contributor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];
    
    /**
     * Get the infections sent by the contributor.
     */
    public function infections()
    {
        return $this->hasMany('App\Infection');
    }
}
