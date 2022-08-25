<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $category = Category::get();
        return view('category.index',compact('category'));
    }
   
    public function add()
    {
        return view('category.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|max:255',
           
        ]);
        Category::create($validated);
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = Category::where('id',$id)->first();
        return view('category.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'category' => 'required|max:255',
            
        ]);
        $update = Category::where('id',$id)->first();
        $update->category = $request->category;
        $update->description = $request->description;
        $update->update();
        $category = Category::get();
        return view('category.index',compact('category'));

       
    }
}
