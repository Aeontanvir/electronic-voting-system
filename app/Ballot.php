<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ballot extends Model
{
    protected $fillable = [
        'id',
        'voter_id',
        'candidate_id',
        'zone_id',
    ];

    public function voter(){
		return $this->belongsTo('App\Voter');
    }
    
    public function candidate(){
		return $this->belongsTo('App\Candidate');
    }

}
