<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basketproduct extends Model
{
    public function basket(){
        return $this->belongsTo('app\Basket');
    }
}
