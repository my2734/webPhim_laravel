@extends('admin.layout.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách phim</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Movie</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        
        <div class="row mt-4">
            <div class="col-md-2">
                <a href="{{route('admin.movie')}}">
                    <button class=" btn btn-secondary mb-2">List phim</button>
                </a>
            </div>
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    
                    <div class="card-header">
                        <h3 class="card-title">Form movies</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="@if(isset($movie_edit)) {{route('movie.update',$movie_edit->id)}} @else {{route('movie.store')}} @endif" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" value="@if(isset($movie_edit)) {{$movie_edit->title}} @endif" name="title" id="exampleInputEmail1" placeholder="Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category_id" class="custom-select">
                                            @foreach($categories as $key => $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Genre</label>
                                        <select name="genre_id" class="custom-select">
                                            @foreach($genres as $key => $genre)
                                          <option @if(isset($movie_edit)) @if($movie_edit->genre->id == $genre->id) selected @endif @endif value="{{$genre->id}}">{{$genre->title}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Resolution</label>
                                        <select name="resolution" class="custom-select">
                                          <option @if(isset($movie_edit)) @if($movie_edit->resolution == 0) selected @endif @endif value="0">SD</option>
                                          <option @if(isset($movie_edit)) @if($movie_edit->resolution == 1) selected @endif @endif value="1">HD</option>
                                          <option @if(isset($movie_edit)) @if($movie_edit->resolution == 2) selected @endif @endif value="2">Full HD</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trailer</label>
                                        <input type="text" class="form-control" value="@if(isset($movie_edit)) @if(isset($movie_edit->trailer)) {{$movie_edit->trailer}} @endif @endif" name="trailer" id="exampleInputEmail1" placeholder="Trailer">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name English</label>
                                        <input type="text" class="form-control" value="@if(isset($movie_edit)) @if(isset($movie_edit->name_eng)) {{$movie_edit->name_eng}} @endif @endif" name="name_eng" id="exampleInputEmail1" placeholder="Name English">
                                    </div>
                                    <div class="form-group">
                                        <label>Year</label>
                                        <select name="year" class="custom-select">
                                            @for($i=2000;$i<=2022;$i++)
                                        <option @if(isset($movie_edit)) @if(isset($movie_edit->year)) @if($movie_edit->year == $i) selected @endif @endif @endif value="{{$i}}">Năm {{$i}}</option>
                                        @endfor
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Top View</label>
                                        
                                            <select name="topview" class="custom-select">
                                                <option @if(isset($movie_edit)) @if($movie_edit->topview == 0) selected @endif @endif value="0">Theo ngày</option>
                                                <option @if(isset($movie_edit)) @if($movie_edit->topview == 1) selected @endif @endif value="1">Theo tuần</option>
                                                <option @if(isset($movie_edit)) @if($movie_edit->topview == 2) selected @endif @endif value="2">Theo tháng</option>
                                              </select>
                                            
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image movie</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">@if(isset($movie_edit)) {{$movie_edit->image}} @else Choose file @endif</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="country_id" class="custom-select">
                                            @foreach($countries as $key => $country)
                                          <option @if(isset($movie_edit)) @if($movie_edit->country->id == $country->id) selected @endif @endif value="{{$country->id}}">{{$country->title}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <select name="subtitle" class="custom-select">
                                          <option @if(isset($movie_edit)) @if($movie_edit->subtitle == 0) selected @endif @endif value="0">Vietsub</option>
                                          <option @if(isset($movie_edit)) @if($movie_edit->subtitle == 1) selected @endif @endif value="1">Thuyết minh</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Phim Hot</label>
                                        <select name="phimhot" class="custom-select">
                                        <option @if(isset($movie_edit)) @if($movie_edit->phimhot == 1) selected @endif @endif value="1">Phim hot</option>
                                          <option @if(isset($movie_edit)) @if($movie_edit->phimhot == 0) selected @endif @endif value="0">Phim không hot</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thời lượng</label>
                                        <input type="text" class="form-control" value="@if(isset($movie_edit)) @if(isset($movie_edit->thoiluong)) {{$movie_edit->thoiluong}} @endif @endif" name="thoiluong" id="exampleInputEmail1" placeholder="Thời lượng phim">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tags</label>
                                        <input type="text" class="form-control" value="@if(isset($movie_edit)) @if(isset($movie_edit->tags)) {{$movie_edit->tags}} @endif @endif" name="tags" id="exampleInputEmail1" placeholder="Tags phim">
                                    </div>
                                    <div class="form-group">
                                        <label>Season</label>
                                        <select name="season" class="custom-select">
                                            @for($i=1;$i<=20;$i++)
                                        <option @if(isset($movie_edit)) @if(isset($movie_edit->season)) @if($movie_edit->season == $i) selected @endif @endif @endif value="{{$i}}">Season {{$i}}</option>
                                        @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter ..." style="height: 116px;">@if(isset($movie_edit)) {{$movie_edit->description}} @endif</textarea>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="status" @if(isset($movie_edit)) @if($movie_edit->status==1) checked @endif @endif class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Active</label>
                            </div>
                            
                            
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="{{route('admin.movie')}}"><button type="button" class="btn btn-success">Back</button></a>
                            <button type="submit" class=" btn @if(isset($movie_edit)) btn-danger @else btn-primary @endif">@if(isset($movie_edit)) Update @else Submit @endif</button>
                        </div>
                        @csrf
                    </form>
                </div>

                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
   

@endsection

