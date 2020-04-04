<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    public function user(){
        return $this->belongsTo('app\User');
    }
    public function basketproduct(){
        return $this->hasMany('app\Basketproduct');
    }
    protected $fillable = ['user_id'];
}
