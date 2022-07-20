<?php

namespace App\Http\Controllers;
use  App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    public function index(){
        $countries = Country::all();
        return view('admin.country.index',compact('countries'));
    }

    public function create(){
        return view('admin.country.create');
    }

    public function store(Request $request){
        // dd($request->input());
       $country = new Country();
      
       $country->title = $request->title;
       $country->description = $request->description;
       $country->status = isset($request->status) ? 1: 0;
       $country->slug = Str::slug($request->title);
      
       $country->save();
       return redirect('admin/quoc-gia');
    }

    public function delete($id){
        Country::find($id)->delete();
        return redirect('admin/quoc-gia');
    }

    public function edit($id){
        $coun_edit = Country::where('id',$id)->first();
        return view('admin.country.create',compact('coun_edit'));
    }

    public function update(Request $request, $id){
        $country = Country::where('id',$id)->first();
        $country->title = $request->title;
        $country->description = $request->description;
        $country->status = isset($request->status) ? 1: 0;
        $country->slug = Str::slug($request->title);
        $country->save();
        return redirect('admin/quoc-gia');
        
    }
}
