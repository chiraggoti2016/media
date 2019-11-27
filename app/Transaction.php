<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['transaction_id', 'authorizing_merchant_id', 'approved', 'message', 'auth_code', 'transaction_created', 'order_number', 'type', 'payment_method', 'risk_score', 'amount', 'jsondata', 
	];

}
