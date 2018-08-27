<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total', 'total_discount', 'date', 'user_id'
    ];

    public function products(){
        return $this->hasMany('App\SaleDetails');
    }
}
