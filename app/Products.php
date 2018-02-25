<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'title', 'price', 'description', 'photo', 
    ];
	
	public function tovarcategoris()
    {
		return $this->belongsToMany('App\Categoriproducts', 'tovar_id');
    }
}
