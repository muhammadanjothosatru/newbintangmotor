<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>BINTANG MOTOR &mdash; Admin Page</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/modules/datatables/datatables.min.css')}}"/>

  <!-- Jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- script src="{{ asset('assets/modules/select2/dist/js/select2.min.js')}}"></script -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
<<<<<<< HEAD
  

<!-- <script>
    $(document).ready(function(){
        $(document).on('click','#sidebar-menu li',function(){
            $('li').removeClass("active");
            $(this).addClass("active");

            // without this below, the click on the link changes
            // the page, so the HTML gets reset
            return false ;
        })
    }) ;
</script> -->
<!-- datatable -->
=======



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <link rel="stylesheet" href="{{ asset('css/general.css')}}">
  @yield('link_css')

  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
>>>>>>> fd2a75e34e0158ade0c540f20f7893c296376544
<script>
    $(document).ready(function () {
    var table = $('#example').DataTable();
});
</script>
<<<<<<< HEAD
=======

>>>>>>> fd2a75e34e0158ade0c540f20f7893c296376544


<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <nav class="navbar navbar-expand-lg main-navbar">
      <div class="navbar-bg"></div>
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
    
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
       
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->username  }}    </div></a>
            <div class="dropdown-menu dropdown-menu-right">
       
       
              <div class="card align-items-end pr-5 pt-3">
                <div class>
                  <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
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
          <div class=container-fluid>
            @yield('konten')
          </div>
        </section>
      </div>
      @include('template.footer')
      