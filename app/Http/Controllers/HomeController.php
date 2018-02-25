<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Products;
use App\Categories;
use App\Categoriproducts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {	
		$products = Products::orderBy('created_at', 'desc')
					->paginate(5);
					
		$categories = Categories::all();
		$countproducts = Products::count();
		$countcategories =  Categories::count();
		
		return view('home')
				->with('products', $products)
				->with('countproducts', $countproducts)
				->with('countcategories', $countcategories)
				->with('categories', $categories);
    }
	
	public function show($id)
    {	
		$showproduct = Products::find($id);
		
		dump ($showproduct->toJson());

		return view('showproduct')
			->with('showproduct', $showproduct);
    }
	
	

	
	public function showcategori($id)
    {	
		$showproduct = Products::find($id);

		return view('showproduct')
			->with('showproduct', $showproduct);
    }
	
	
	
	
}