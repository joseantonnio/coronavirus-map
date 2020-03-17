<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Infection;

class Contributor extends Model
{
    protected $fillable = ['name', 'email'];
    
    public function infections()
    {
        return $this->belongsToMany('App\Infection');
    }
}
