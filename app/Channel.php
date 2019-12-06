<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Channel extends Model
{
    protected $appends = ['logo_tag'];

	public function getLogoTagAttribute()
	{
	    return '<img src="'.asset('storage/'.$this->logo).'" width=50 height=50 />';
	}

}
