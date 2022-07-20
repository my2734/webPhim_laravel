<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Support\Str;


class MovieController extends Controller
{
    public function index(){
        $movies = Movie::with('category','country','genre')->orderBy('id','DESC')->get();
        
        return view('admin.movie.index',compact('movies'));
    }

    public function create(){
        $categories = Category::all();
        $countries = Country::all();
        $genres = Genre::all();
        return view('admin.movie.create',compact('categories','countries','genres'));
    }

    public function store(Request $request){
        // dd($request->input());
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->slug = Str::slug($request->title);
        $movie->status = isset($request->status) ? 1 : 0;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->genre_id = $request->genre_id;
        $movie->image = "";
        $file = $request->file('image');
        $path = "Uploads/";
        if($file){
            $get_name_image = $file->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_name = $name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_name);
            $movie->image = $new_name;
        }
        $movie->phimhot = $request->phimhot;
        $movie->trailer = $request->trailer;
        $movie->thoiluong = $request->thoiluong;
        $movie->name_eng = $request->name_eng;
        $movie->ngaytao = date('Y-m-d H:i:s');
        $movie->tags = $request->tags;
        $movie->topview = $request->topview;
        $movie->year = $request->year;
        $movie->season = $request->season;
       
        
        $movie->save();
        return redirect('admin/phim');
       
    }

    public function delete($id){
        Movie::where("id",$id)->delete();
        return redirect()->back();
    }

    public function edit($id){
        
        $categories = Category::all();
        $countries = Country::all();
        $genres = Genre::all();
        $movie_edit = Movie::where("id",$id)->with('category','country','genre')->first();
        return view('admin.movie.create',compact('categories','countries','genres','movie_edit'));
    }

    public function update(Request $request,$id){
        $movie = Movie::where('id',$id)->first();

        $image_old = $movie->image;
        // dd($image_old); 

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->slug = Str::slug($request->title);
        $movie->status = isset($request->status) ? 1 : 0;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->genre_id = $request->genre_id;
        $movie->image = "";
        $file = $request->file('image');
        $path = "Uploads/";
        if($file){
            //cap nhat anh moi
            $get_name_image = $file->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_name = $name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
            $file->move($path,$new_name);
            $movie->image = $new_name;

           

            // Xoa anh cu
            $path_image_old = public_path().'/Uploads'.'/'.$image_old;
           if(file_exists($path_image_old)){
                unlink($path_image_old);
           }
        }else{
            $movie->image = $image_old;
        }
        $movie->phimhot = $request->phimhot;
        $movie->trailer = $request->trailer;
        $movie->thoiluong = $request->thoiluong;
        $movie->name_eng = $request->name_eng;
        $movie->ngaycapnhat = date('Y-m-d H:i:s');
        $movie->tags = $request->tags;
        $movie->topview = $request->topview;
        $movie->year = $request->year;
        $movie->season = $request->season;
       
        
        $movie->save();
        return redirect('admin/phim');
    }

    public function update_topview_phim(Request $request){
        $data =  $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }

    public function update_year_phim(Request $request){
       $data = $request->all();
       $id = $data['id_phim'];
       $year = $data['year'];
       $movie = Movie::where('id',$id)->first();
       $movie->year = $year;
       $movie->save();
    }

    public function update_season_phim(Request $request){
        $data =  $request->all();
        $id = $data['id_phim'];
        $season =  $data['season'];
        $movie = Movie::where('id',$id)->first();
        $movie->season = $season;
        $movie->save();  
    }
}
