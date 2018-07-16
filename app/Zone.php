<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'id',
        'name', 
        'area_id'
    ];

    public function area(){
		return $this->belongsTo('App\Area');
    }

}
