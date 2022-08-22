<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>BINTANG MOTOR &mdash; Admin Page</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="css/sidebar.css">

  <!-- CSS Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>


<script>
        jQuery(document).ready(function($){
            $("#sidebar-menu").click(function(e) {
            e.preventDefault();
            $("#sidebar-menu").toggleClass("toggled");
            });
        })
        </script>
        <script>
            $(function(){
                console.log('ready');
                
                $('#sidebar-menu li').click(function(e) {
                    e.preventDefault()
                    
                    $that = $(this);
                    
                    $that.parent().find('li').removeClass('active');
                    $that.addClass('active');
                });
            })
        </script>


<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
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
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi, admin</div></a>
            <div class="dropdown-menu dropdown-menu-right">
       
       
              <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item has-icon text-dark">
                    <i class="">Logout</i>
                </a>
                
            </div>
          </li>
        </ul>
      </nav>
      
      @include('template.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('sub-judul')</h1>
          </div>
          @yield('content')
          <div class="section-body">
          </div>
        </section>
      </div>
      @include('template.footer')
      