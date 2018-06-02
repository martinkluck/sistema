<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'status', 'stock', 'imei', 'code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'status',
    ];

    public function bills()
    {
        return $this->belongsToMany('App\Bill');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
