<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'product_id'
    ];

    public function product() {
        $this->belongsTo('App\Product');
    }

    public function user() {
        $this->belongsTo('App\User');
    }
}
