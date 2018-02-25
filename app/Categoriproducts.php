<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoriproducts extends Model
{
	public $timestamps = false;
	
    protected $fillable = [
        'categori_id', 'tovar_id',
    ];
	
	public function categoristovar()
    {
		return $this->hasMany('App\Categories', 'id');
    }
}
