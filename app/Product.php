<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'available', 'price', 'files' 
    ];

    protected $table = 'Products';

    
    public $primaryKey = 'id';


    public $timestamp = true;


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function stock(){
        return $this->hasMany('App\Stock');
    }
}
