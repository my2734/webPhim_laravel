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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Movie</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><a href="{{route('movie.create')}}"><button class="btn btn-primary mb-4">New Create <i class="fa fa-plus"></i></button></a></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row" style="font-size: 9px;">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                            <tr class="odd">
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Resolution</th>
                                                <th>Subtitle</th>
                                                <th>Active</th>
                                                <th>Category</th>
                                                <th>Country</th>
                                                <th>Genre</th>
                                                <th>Phim Hot</th>
                                                <th>Trailer</th>
                                                <th>Thời lượng</th>
                                                <th>Name English</th>
                                                <th>Top view</th>
                                                <th>Year</th>
                                                <th>Season</th>
                                                <th>Manager</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($movies as $key => $movie)
                                            <tr class="odd">
                                                <td>{{($key+1)}}</td>
                                                <td style="width: 80px;">{{$movie->title}}</td>
                                                <td>
                                                    <img style="width: 60px;" src="{{asset('Uploads/'.$movie->image)}}" alt="">
                                                </td>
                                                <td>
                                                    @if($movie->resolution==0) SD
                                                    @elseif($movie->resolution==1) HD
                                                    @else Full HD
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($movie->subtitle==0) Vietsub
                                                    @else Thuyết minh
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($movie->status==0) Không hiển thị
                                                    @else Hiển thị
                                                    @endif
                                                </td>
                                                <td>{{$movie->category->title}}</td>
                                                <td>{{$movie->country->title}}</td>
                                                <td>{{$movie->genre->title}}</td>
                                                <td>@if($movie->phimhot==1) Hot @else Không hot @endif</td>
                                                <td>@if(isset($movie->trailer)) {{$movie->trailer}} @endif</td>
                                                <td>@if(isset($movie->thoiluong)) {{$movie->thoiluong}} phút @endif</td>
                                                <td>@if(isset($movie->name_eng)) {{$movie->name_eng}} @endif</td>

                                                <td>
                                                    <form action="" >
                                                        <select class="select_topview" id="{{$movie->id}}">
                                                            <option @if($movie->topview==0) selected @endif value="0">Ngày</option>
                                                            <option @if($movie->topview==1) selected @endif value="1">Tuần</option>
                                                            <option @if($movie->topview==2) selected @endif value="2">Tháng</option>
                                                        </select>
                                                        @csrf
                                                    </form>
                                                </td>
                                               
                                                <td>
                                                   
                                                        <select class="select_year" id="{{$movie->id}}">
                                                            @for($i=2000;$i<=2022;$i++)
                                                            <option @if($movie->year == $i) selected @endif value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                </td>
                                                <td>
                                                    <select class="select_season" id="{{$movie->id}}">
                                                        @for($i=0;$i<=20;$i++)
                                                        <option @if($movie->season == $i) selected @endif>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td >
                                                    <a href="{{route('movie.delete',$movie->id)}}"><button style="font-size: 10px;" class="btn btn-sm btn-danger" onclick="return confirm('Are you can sure delete it?')"><i class="fa fa-trash"></i></button></a>
                                                    <a href="{{route('movie.edit',$movie->id)}}" @if(isset($movie_edit)) @if($movie_edit->subtitle == 0) selected @endif @endif)}}"><button style="font-size: 10px;" class="btn btn-sm btn-info"><i class="fa fa-pen"></i></button></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                            <li class="paginate_button page-item active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                            
                                            <li class="paginate_button page-item next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                
            </div>
        </div>
    </div>
</section>
   

@endsection