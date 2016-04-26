<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
	'client_id',
	'user_deliveryman_id',
	'total',
	'status'
	];


    public function items()
    {
    	return $this->hasMany('CodeDelivery\Models\OrderItem');
    }

    public function deliveryman()
    {
    	return $this->belongsTo('CodeDelivery\Models\User');
    }

    public funtion client()
    {
    	return $this->belongsTo('CodeDelivery\Models\User');
    }
}
