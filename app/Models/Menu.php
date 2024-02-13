<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
      'name',
      'price',
      'image',
      'restaurant_id'
    ];

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class, 'restaurant_id', 'id');
    }
}
