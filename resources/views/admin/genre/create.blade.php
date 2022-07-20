@extends('admin.layout.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Genre Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item ">Genre</li>
                    <li class="breadcrumb-item active">New Create</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        
        <div class="row mt-4">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">NEW GENRE</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    
                    <form method="POST" action="@if(isset($genre_edit)) {{route('genre.update',$genre_edit->id)}} @else {{route('genre.store')}} @endif">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Titile</label>
                                <input type="text" class="form-control" value="@if(isset($genre_edit)) {{$genre_edit->title}} @endif" name="title" id="exampleInputEmail1" placeholder="Titile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text" class="form-control" value="@if(isset($genre_edit)) {{$genre_edit->description}} @endif"  name="description" id="exampleInputPassword1" placeholder="Description">
                            </div>
                            <div class="form-check">
                                <input type="checkbox"  class="form-check-input" @if(isset($genre_edit)) @if($genre_edit->status==1) checked @endif  @endif name="status" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Hiển thị </label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer d-flex justify-content-center"> 
                            <a href="{{route('admin.genre')}}"><button type="button" class=" btn btn-success mr-3">Back</button></a>
                            <button type="submit" class="btn @if(isset($genre_edit)) btn-danger @else btn btn-primary @endif">@if(isset($genre_edit)) Update @else Submit @endif</button>
                        </div>
                       
                        @csrf
                    </form>
                    
                </div>
                <!-- /.card -->
                <!-- general form elements -->
                
            </div>
        </div>
    </div>
</section>
   

@endsection