<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Plan extends Model
{
    function channels() {
	    return $this->belongsToMany(Channel::class, 'plan_channels');
    }
}
