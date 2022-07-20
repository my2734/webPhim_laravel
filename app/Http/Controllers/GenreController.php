<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all(); 
        return view('admin.genre.index',compact('genres'));
    }

    public function create(){
        return view('admin.genre.create');
    }

    public function store(Request $request){
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->description = $request->description;
        $genre->status= isset($request->status) ? 1: 0;
        $genre->slug = Str::slug($request->title);
        $genre->save();
        return redirect('admin/the-loai');
    }

    public function delete($id){
        Genre::find($id)->delete();
        return redirect('admin/the-loai');
    }

    public function edit($id){
        $genre_edit = Genre::where('id',$id)->first();
        return view('admin.genre.create',compact('genre_edit'));
    }

    public function update(Request $request, $id){
        $genre = Genre::where('id',$id)->first();
        $genre->title = $request->title;
        $genre->description = $request->description;
        $genre->status = isset($request->status) ? 1 : 0;
        $genre->slug = Str::slug($request->slug);
        $genre->save();
        return redirect('admin/the-loai');
    }
}
