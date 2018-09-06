<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

	
    protected $fillable = ['title','content','email','phone',];
    protected $dates = ['created_at','updated_at',];
}
