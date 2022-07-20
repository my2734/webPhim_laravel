<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | General Form Elements</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
           @include('admin.layout.topNav')
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="../../index3.html" class="brand-link">
                <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    @include('admin.layout.leftMenu')
                </div>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0
                </div>
                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- bs-custom-file-input -->
        <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('dist/js/demo.js')}}"></script>
        
        <!-- Page specific script -->
        <script>
            $(function () {
              bsCustomFileInput.init();
            });
        </script>
        <script>
            $('.select_topview').change(function(){
                var topview = $(this).find(':selected').val();
                var id_phim = $(this).attr('id');
                
                $.post({
                    url: "{{url('/update-topview-phim')}}",
                    data: {topview:topview,id_phim: id_phim,_token:"{{ csrf_token() }}"},
                    success: function(){
                        alert('Cap nhat thanh cong');
                    }
                });
            });
        </script>

        <script>
            $('.select_year').change(function(){
                var year = $(this).find(':selected').val()
                var id_phim = $(this).attr('id');
                $.ajax({
                    url: "{{'/update-year-phim'}}",
                    method: "GET",
                    data: {year: year,id_phim: id_phim},
                    success: function(){
                        alert('cap nhat thanh cong');
                    }
                });
            });
        </script>

        <script>
            $('.select_season').change(function(){
                var season = $(this).find(':selected').val();
                var id_phim = $(this).attr('id');
                $.get({
                    url: "{{route('season.update')}}",
                    data: {season: season,id_phim : id_phim},
                    success: function(){
                        alert('cap nhat thanh cong');
                    }
                });
            });
        </script>
    </body>
</html>