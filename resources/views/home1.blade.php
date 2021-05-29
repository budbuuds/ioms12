@extends('layouts.app')

@section('content')
{{-- <div class="container"> --}}
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
                    <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
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
                <h4 class="title"><a href="">300</a></h4>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="icofont-medal"></i></div>
                <p class="description">Jumlah Pendaftar</p>
                <h4 class="title"><a href="">350</a></h4>
              </div>
            </div>
        </div>
            <div class="row">
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="bx bx-desktop"></i></div>
                <p class="description">Jumlah Per divisi</p>
                <h4 class="title"><a href="">MMD</a></h4>
                <h4 class="title"><a href="">100</a></h4>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="icofont-settings"></i></div>
                <h4 class="title"><a href="">Programming</a></h4>
                <h4 class="title"><a href="">100</a></h4>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box icon-box-pink">
                <div class="icon"><i class="icofont-settings"></i></div>
                <h4 class="title"><a href="">SKJ</a></h4>
                <h4 class="title"><a href="">100</a></h4>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Card -->
      {{-- datatable section --}}
      <div class="container">
       
        <input type="text" name="email" class="form-control searchEmail" placeholder="Search for Email Only...">
        <br>
       
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
      {{-- end datatable section --}}
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
{{-- </div> --}}
@endsection
