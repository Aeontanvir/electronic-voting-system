<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = [
        'id',
        'nid',
        'name',
        'father_name',
        'mother_name',
        'occupation',
        'gender',
        'blood',
        'religion',
        'date_of_birth',
        'birth_place',
        'address',

        'profile_photo',
        'finger_print',

        'area_id',
        'zone_id'
    ];

    public function area(){
		return $this->belongsTo('App\Area');
    }

    public function zone(){
		return $this->belongsTo('App\Zone');
    }

}
