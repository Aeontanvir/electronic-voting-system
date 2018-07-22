<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'id',
        'nid',
        'name',
        'father_name',
        'mother_name',
        'occupation',
        'date_of_birth',
        'profile_photo',
        'finger_print',
        'area_id',
        'zone_id',
        'party_id',
    ];

    public function area(){
		return $this->belongsTo('App\Area');
    }

    public function zone(){
		return $this->belongsTo('App\Zone');
    }

    public function party(){
		return $this->belongsTo('App\Party');
    }
}
