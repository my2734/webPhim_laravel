<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $category = new Category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->status = isset($request->status)? 1 : 0;
        $category->slug = Str::slug($request->title);
        $category->save();
        return redirect('admin/danh-muc');
    }

    public function delete($id){
       Category::find($id)->delete();
       return redirect('admin/danh-muc');
    }

    public function edit($id){
        $cat_edit  = Category::where('id',$id)->first();
        return view('admin.category.create',compact('cat_edit'));
       
    }
    
    public function update(Request $request,$id){
        dd("HEllo");
        // $category = Category::where('id',$id)->first();
        // dd($category->id);
        // dd($request->input());
        // $category->title = $request->title;
        // $category->description = $request->description;
        // $category->status = isset($request->status)? 1 : 0;
        // $category->slug = Str::slug($request->title);
        // $category->save();
        // return redirect('admin/danh-muc');
    }
}
