<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'user_id', 'category_id', 'description', 'title', 'price', 'views'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function photo() {
        return $this->hasMany('App\Photo', 'product_id', 'id');
    }
}
