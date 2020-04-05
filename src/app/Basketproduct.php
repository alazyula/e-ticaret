<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basketproduct extends Model
{
    public function basket(){
        return $this->belongsTo('app\Basket');
    }
    protected $fillable = ['basket_id','product_id','quantity','price'];
}
