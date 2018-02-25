<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {	
		$categories = Categories::all();
		
		return view('admin.categori')
			->with('categories', $categories);
    }
	
	public function create()
    {	
		return view('admin.addcategori');
    }
	
	public function store(Request $request)
    {	
		$this->validate($request, [
		'name' => 'required|max:100|min:3'
		]);

		$createcategory = new Categories;
        $createcategory->name = $request->name;
		$createcategory->save();
		return redirect('/categori')->with('message','Категория добавлена');
	}	
	
	public function destroy($id)
	{
		$categoridelete = Categories::find($id); 
		$categoridelete->delete();
		
		return back()->with('message','Категория удалена');
	}
	
	public function edit($id)
    {	
		$categori = Categories::find($id);
		return view('admin.editcategori')->with('categori', $categori);
    }
	
	public function update(Request $request, $id)
	{
		$category = Categories::find($id);
		$category->update($request->all());
		$category->save();
		return redirect('/categori')->with('message','Категория обновленна');;
	}
	
}
