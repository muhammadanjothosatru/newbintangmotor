<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="styles/mainstyle.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
        jQuery(document).ready(function($){
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        })
        </script>
        <script>
            $(function(){
                console.log('ready');
                
                $('#sidebar-wrapper a').click(function(e) {
                    e.preventDefault()
                    
                    $that = $(this);
                    
                    $that.parent().find('a').removeClass('active');
                    $that.addClass('active');
                });
            })
        </script>
        <style>
            body {
        overflow-x: hidden;
        }

        #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper {
        width: 252px;
        }

        #page-content-wrapper {
        min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
        }

        @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -12rem;
        }
        }
        </style>    
    </head>
    <body>
        <div class="d-flex bar-color" id="wrapper">

        <!-- Sidebar -->
        <div class="" id="sidebar-wrapper">
        <div class="sidebar-heading"><img src="images/logo2.png" alt="" class="logo-size"></div>
        <div class="container-fluid p-0 justify-content-center">
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action font active" style="border: none">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action font" style="border: none">Kendaraan</a>
                <a href="#" class="list-group-item list-group-item-action font" style="border: none">Pelanggan</a>
                <a href="#" class="list-group-item list-group-item-action font" style="border: none">Pembelian</a>
                <a href="#" class="list-group-item list-group-item-action font" style="border: none">Laporan</a>
            </div>
        </div>
        
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="body-color" id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg bar-color pl-0">
            <div class="container-fluid p-0 m-0">
                <button class="btn" id="menu-toggle"><img src="images/hamburgericon.png" alt="" class="icon-size"></button>
                <span class="navbar-text font align">
                    Admin Lamongan
                </span>
            </div>
        </nav>

        <div class="container-fluid">
            <h1 class="mt-4">Main Content Disini!</h1>
        </div>
        </div>
        <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </body>
</html>