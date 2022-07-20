<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;



class IndexController extends Controller
{
    public function index(){
        $categories = Category::with('movie')->get();
        $countries = Country::all();
        $genres = Genre::all();
        return view('page.homePage',compact('categories','countries','genres'));
    }

    public function category($slug){
        $categories = Category::with('movie')->get();
        $countries = Country::all();
        $genres = Genre::all();
        $category_slug = Category::where('slug',$slug)->with('movie')->first();
        // dd($category_slug->title);
        return view('page.category',compact('categories','countries','genres','category_slug'));
    }

    public function country($slug){
        $categories = Category::with('movie')->get();
        $countries = Country::all();
        $genres = Genre::all();
        $country_slug = Country::where('slug',$slug)->with('movie')->first();
        return view('page.country',compact('categories','countries','genres','country_slug'));
    }

    public function genre($slug){
        $categories = Category::with('movie')->get();
        $countries = Country::all();
        $genres = Genre::all();
        $genre_slug = Genre::where('slug',$slug)->with('movie')->first();
        return view('page.genre',compact('categories','countries','genres','genre_slug'));
    }

    public function movie($slug){
        $categories = Category::with('movie')->get();
        $countries = Country::all();
        $genres = Genre::all();
        $movie_detail = Movie::where('slug',$slug)->with('category','country','genre')->first();
        $relate_movies = Movie::where('category_id',$movie_detail->category_id)->where('id','!=',$movie_detail->id)->get();
       
        // echo count($relate_movies);
        return view('page.movie',compact('categories','countries','genres','movie_detail','relate_movies'));
    }
}
