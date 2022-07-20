<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Country extends Model
{
    public $timestamps = false;
    protected $table = 'countries';
    use HasFactory;

    public function movie(){
        return $this->hasMany(Movie::class);
    }
}
