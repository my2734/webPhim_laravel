<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;



class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'movies';

    public function category()
    {
    	return $this->belongsto(Category::class,'category_id','id');
    }

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function genre(){
        return $this->belongsTo(Genre::class,'genre_id','id');
    }
    


}
