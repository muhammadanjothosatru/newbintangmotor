<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>BINTANG MOTOR &mdash; Admin Page</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/sweetalert/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/daterangepicker-master/daterangepicker-master/daterangepicker.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/modules/datatables2/datatables.css')}}"/>

  <!-- Jquery -->
  <script src="{{ asset('assets/modules/sweetalert/sweetalert2.min.js')}}"></script>
  <script src="{{ asset('assets/modules/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/modules/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{ asset('assets/modules/chart.min.js')}}"></script>

  <!-- Template CSS -->

  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{ asset('css/general.css')}}">
  @yield('link_css')


  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest')}}">


  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

<!-- /END GA -->

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <nav class="navbar navbar-expand-lg main-navbar">
      <div class="navbar-bg"></div>
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
       
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->username  }} <i class="fas fa-caret-down"></i> </div></a>
            <div class="dropdown-menu dropdown-menu-right">
       
       
              <div class="card align-items-end pr-5 pt-3">
                <div class>
                  <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item"> <i class='fas fa-sign-out-alt'></i> Logout </button>
                  </form>  
                  {{-- <a href="/logout" class=""><i class="">Logout</i></a> --}}
                </div>
              </div>
                  
                
            </div>
          </li>
        </ul>
      </nav>
      
      @include('template.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="container-fluid p-0">
            @yield('konten')
          </div>
        </section>
      </div>
      @include('template.footer')
      