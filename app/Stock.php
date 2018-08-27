<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'name', 'amount',  'expire_date', 'user_id', 'product_id'
    ];

    
    protected $table = 'Stocks';

    
    public $primaryKey = 'id';


    public $timestamp = true;

    public function product(){
        return $this->belongsTo('App\Product');
    }

}
