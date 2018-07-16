<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{ 
    protected $fillable = ['id', 'title', 'short', 'description', 'image'];
}
