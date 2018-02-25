<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Products;
use App\Categoriproducts;

class ProductController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {	
		$products = Products::all();
		return view('admin.product')
			->with('products', $products);
    }
	
	public function create()
    {	
		$categories = Categories::all();
		return view('admin.addproduct')->with('categories', $categories);
    }
	
	
	public function store(Request $request)
    {	
		$this->validate($request, [
			'title' => 'required|max:100|min:3',
			'photo_prev' => 'mimes:jpeg,jpg,png',
			'price' => 'required|numeric',
			'description' => 'required|min:10'
		]);
		
		//Добавляем новый товар
		$product = new Products;
        $product->title = $request->title;
        $product->price = $request->price;
		$product->description = $request->description;
		
		//Заливаем фото товара
		$root = $_SERVER['DOCUMENT_ROOT']."/img/"; 
		$f_name = $request->file('prev_photo')->getClientOriginalName();
		$request->file('prev_photo')->move($root,$f_name); 	
        $product->photo = $f_name;   
		$product->save();
		
		//Добавляем категории
	
		if($request->category != null) {
			foreach ($request->category as $category) {
						$productcategori = new Categoriproducts;
						$productcategori->tovar_id = $product->id;
						$productcategori->categori_id = $category;
						$productcategori->save();	
					}
			}	
		return redirect('/product')->with('message','Товар добавлен');
    }
	
	public function destroy($id)
	{
		$productdelete=Products::find($id); 
		$productdelete->delete();
		
		return back()->with('message','Товар удален');
	}
	
	
	public function edit($id)
    {	
	
		$producti = Products::find($id);
		$categories = Categories::all();
		$categorivibrani = Categoriproducts::where('tovar_id', $id)->get();
				
		return view('admin.editproduct')
			->with('producti', $producti)
			->with('categorivibrani', $categorivibrani)
			->with('categories', $categories);
    }
	
	public function update(Request $request, $id)
	{
		
	}

	
}
