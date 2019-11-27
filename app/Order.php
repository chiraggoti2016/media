<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone_number', 'plan_id', 'plan_install_fee', 'install_date1', 'install_date2', 'install_date3', 'install_time1', 'install_time2', 'install_time3', 'installation_addr', 'addons_data', 'total', 'discount', 'tax', 'shipping', 'grand_total', 'order_number', 'first_name', 'last_name', 'email', 'homephone', 'cellphone', 'prefered_method'
    ];
}
