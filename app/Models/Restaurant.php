<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurant';
    protected $fillable = [
        'name',
        'description',
        'image',
        'chars'
    ];
    protected $casts = [
        'chars' => 'array'
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class, 'restaurant_id', 'id');
        //return $this->belongsToMany(Menu::class);
    }
}
