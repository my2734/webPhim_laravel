<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Admin
Route::prefix('admin')->group(function(){
    Route::get('/',function(){
        return view('admin.index');
    });

    Route::prefix('/danh-muc')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category');
        Route::get('/create',[CategoryController::class,'create'])->name('category.create');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::get('/delete/{id}', [CategoryController::class,'delete'])->name('category.delete');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('category.update');
    });

    Route::prefix('/quoc-gia')->group(function(){
        Route::get('/',[CountryController::class,'index'])->name('admin.country');
        Route::get('/create',[CountryController::class,'create'])->name('country.create');
        Route::post('/store',[CountryController::class,'store'])->name('country.store');
        Route::get('/delete/{id}',[CountryController::class,'delete'])->name('country.delete');
        Route::get('/edit/{id}',[CountryController::class,'edit'])->name('country.edit');
        Route::post('/update/{id}',[CountryController::class,'update'])->name('country.update');
    });

    Route::prefix('/the-loai')->group(function(){
        Route::get('/',[GenreController::class,'index'])->name('admin.genre');
        Route::get('/create',[GenreController::class,'create'])->name('genre.create');
        Route::post('/store',[GenreController::class,'store'])->name('genre.store');
        Route::get('/delte/{id}',[GenreController::class,'delete'])->name('genre.delete');
        Route::get('/edit/{id}',[GenreController::class,'edit'])->name('genre.edit');
        Route::post('/update/{id}',[GenreController::class,'update'])->name('genre.update');
    });

    Route::prefix('/phim')->group(function(){
        Route::get('/',[MovieController::class,'index'])->name('admin.movie');
        Route::get('/create',[MovieController::class,'create'])->name('movie.create');
        Route::post('/store',[MovieController::class,'store'])->name('movie.store');
        Route::get('/delete/{id}',[MovieController::class,'delete'])->name('movie.delete');
        Route::get('/edit/{id}',[MovieController::class,'edit'])->name('movie.edit');
        Route::post('/update/{id}',[MovieController::class,'update'])->name('movie.update');
    });
});


Route::post('/update-topview-phim',[MovieController::class,'update_topview_phim'])->name('topview.update');
Route::get('/update-year-phim',[MovieController::class,'update_year_phim']);
Route::get('/update-season-phim',[MovieController::class,'update_season_phim'])->name('season.update');

// Front_end

Route::get('/',[IndexController::class,'index'])->name('homePage');

Route::prefix('/danh-muc')->group(function(){
    Route::get('/{slug}',[IndexController::class,'category'])->name('category');
});

Route::prefix('/quoc-gia')->group(function(){
    Route::get('/{slug}',[IndexController::class,'country'])->name('country');
});

Route::prefix('/the-loai')->group(function(){
    Route::get('/{slug}',[IndexController::class,'genre'])->name('genre');
});

Route::prefix('/phim')->group(function(){
    Route::get('/{slug}',[IndexController::class,'movie'])->name('movie');
});
