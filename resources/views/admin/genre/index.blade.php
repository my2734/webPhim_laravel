@extends('admin.layout.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách thể loại</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <a href="{{route('genre.create')}}"><button class="btn btn-primary">New Create <i class="fa fa-plus"></i></button></a>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Category</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Manager</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($genres as $key => $genr)
                                <tr>
                                    <td>{{($key+1)}}</td>
                                    <td>{{$genr->title}}</td>
                                    <td>{{$genr->description}}</td>
                                    <td>
                                        <span class="tag tag-success">@if($genr->status==1) Hiển thị @else Không hiển thị @endif</span>
                                    </td>
                                    <td>
                                        <a href="{{route('genre.edit',$genr->id)}}"><button class="btn btn-sm btn-info">Edit</button></a>
                                        <a href="{{route('genre.delete',$genr->id)}}"><button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you can delete it?')">Delete</button></a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
   

@endsection