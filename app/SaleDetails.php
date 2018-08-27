<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetails extends Model
{
    protected $fillable = [
        'amount', 'price',  'sub_total','sub_discount', 'user_id', 'sale_id'
    ];

    
    protected $table = 'sale_detals';

    
    public $primaryKey = 'id';


    public $timestamp = true;

    public function product(){
        return $this->belongsTo('App\Sales');
    }
}
