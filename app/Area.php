<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'id', 
        'district'
    ];

    public function zones() {
        return $this->hasMany('App\Zone');
    }
}
