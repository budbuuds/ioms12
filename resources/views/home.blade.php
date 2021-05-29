<!DOCTYPE html>
<html>
<head>
    <title>Home Panitia</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">IOMS OR 12</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Event Organisasi</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Event Operasional</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Rekap Absen</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Informasi</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status/ Seleksi</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Report</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Logbook</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                             <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                    <!-- ======= Card Section ======= -->
    <section class="services">
        <div class="container">
  
        <div class="row">
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="bx bx-stats"></i></div>
                <p class="description">Peserta Aktif</p>
                <h4 class="title"><a href="">{{$peserta}}</a></h4>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="icofont-medal"></i></div>
                <p class="description">Jumlah Pendaftar</p>
                <h4 class="title"><a href="">{{$pendaftar}} </a></h4>
              </div>
            </div>
        </div>
            <div class="row">
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="bx bx-desktop"></i></div>
                <p class="description">Jumlah Per divisi</p>
                <h4 class="title"><a href="">MMD</a></h4>
                <h4 class="title"><a href="">{{ $mmd }} </a></h4>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="icofont-settings"></i></div>
                <h4 class="title"><a href="">Programming</a></h4>
                <h4 class="title"><a href="">{{ $prog }} </a></h4>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="icofont-settings"></i></div>
                <h4 class="title"><a href="">SKJ</a></h4>
                <h4 class="title"><a href="">{{ $skj }}</a></h4>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Card -->
<div class="container">
   
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No BP</th>
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>Divisi</th>
                <th>Sub Divisi</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
  
</body>
<script type="text/javascript">
    $(function () {
     
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
            url: "{{ route('home') }}",
            data: function (d) {
                  d.email = $('.searchEmail').val(),
                  d.search = $('input[type="search"]').val()
              }
          },
          columns: [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'id_divisions', name: 'id_divisions'},
              {data: 'id_divisions', name: 'id_divisions'},
              {data: 'id_divisions', name: 'id_divisions'},
              {data: 'id_subdivs', name: 'id_subdivs'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
     
      $(".searchEmail").keyup(function(){
          table.draw();
      });
    
    });
  </script>
</html>
