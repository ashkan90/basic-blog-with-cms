<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
    	'url', 'title',
    	'description', 'keywords',
    	'copyright', 'logo',
    	'email', 'phone',
    	'country', 'city',
    	'address', 'name'
    ];
}
