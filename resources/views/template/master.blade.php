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
  <link rel="stylesheet" href="{{ asset('assets/modules/daterangepicker-master/daterangepicker-master/daterangepicker.css')}}">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/modules/datatables2/datatables.css')}}"/>

  <!-- Jquery -->
  <script src="{{ asset('assets/modules/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/modules/select2/dist/js/select2.min.js')}}"></script>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="{{ asset('css/general.css')}}">
  @yield('link_css')

  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

<!-- /END GA -->

<script>

$(document).ready( function () {

    var table2 = $('#example').DataTable({
    });
    var table = $('#laporan').DataTable({
      dom: 'Bfrtip',
      init: function(api, node, config) {
          $(node).removeClass('dt-button')
        },
        buttons: [
          {
            text: '<i class="fas fa-file-export"><a class="ml-2 font-export">Export</a></i>',
            extend: 'pdf',
            download: 'open',
            className: 'btn btn-primary btn-sm',
            title: 'Laporan Bintang Motor ',
            extension: '.pdf',
            init: function(api, node, config) {
              $(node).removeClass('dt-button buttons-pdf buttons-html5')
            }
          }
        ]

    });

    // new $.fn.dataTable.Buttons(table, { 
    //     init: function(api, node, config) {
    //       $(node).removeClass('dt-button')
    //     },
    //     buttons: [
    //       {
    //         text: '<i class="fas fa-file-export"><a class="ml-2 font-export">Export</a></i>',
    //         extend: 'pdf',
    //         download: 'open',
    //         className: 'btn btn-primary btn-sm',
    //         title: 'Laporan Bintang Motor ',
    //         extension: '.pdf',
    //         init: function(api, node, config) {
    //           $(node).removeClass('dt-button buttons-pdf buttons-html5')
    //         }
    //       }
    //     ]
    // }).container().appendTo($('.pdf'));
    
    $('.daterange').on('apply.daterangepicker', function(ev, picker) {
    minDate = picker.startDate.format('DD MMM YYYY');
    maxDate = picker.endDate.format('DD MMM YYYY');

    table.draw();
  });

  var minDate, maxDate;
 
  $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
        if ( settings.nTable.id !== 'laporan' ) {
          return true;
        }
          var min = new Date(minDate);
          var max = new Date(maxDate);

          var date = new Date(data[1]);
  
          if (
              ( min === null && max === null ) ||
              ( min === null && date <= max ) ||
              ( min <= date   && max === null ) ||
              ( min <= date   && date <= max )
          ) {
              return true;
          }
          return false;
      }
  );

  });
</script>


</head>

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
          <div class="container-fluid p-0">
            @yield('konten')
          </div>
        </section>
      </div>
      @include('template.footer')
      