<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <title>BINTANG MOTOR &mdash; Login Page</title>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Login</title>
        <link rel="stylesheet" href="css/login.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
                
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest')}}">

    </head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="d-flex align-items-center justify-content-center vh-100">
                                <div class="card">
                                <div class="d-flex align-items-center justify-content-center pt-4 pb-4">
                                    {{-- Error Alert --}}
                                    {{-- @if(session('login_gagal'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('login_gagal')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif --}}
                                    <div class="card-body align-items-center">
                                        <div class="d-flex justify-content-center mb-5">
                                            <img src="images/logo2.png" alt="" class="logo-size">
                                        </div>
                                        @if(session('login_gagal'))
                                
                                            <div class="alert alert-warning alert-dismissible fade show error font-error ml-3" role="alert">
                                             {{-- <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span> --}}
                                                <span class="alert-inner--text"><strong>Peringatan!</strong> <br>Username atau password yang anda masukkan salah.</br> </span>
                                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <div class="col">
                                            <form action="{{url('login')}}" method="POST" id="logForm">
                                                @csrf
                                                <div class="form-group">
                                                    
                                                    <label class="form-label" for="username">Username</label>
                                                    <input
                                                        class="form-control"
                                                        id="username"
                                                        name="username"
                                                        type="text"
                                                        value="{{old('username')}}"
                                                        placeholder="Masukkan Username"/>
                                                    @if($errors->has('username'))
                                                    <span class="error font-error text-danger">Username wajib diisi!</span>
                                                    @endif
                                                </div>
                                                <div class="form-group mb-5">
                                                    <label class="form-label" for="inputPassword">Password</label>
                                                    <input
                                                        class="form-control"
                                                        id="inputPassword"
                                                        type="password"
                                                        name="password"
                                                        placeholder="Masukkan Password"/>
                                                    @if($errors->has('password'))
                                                    <span class="error font-error text-danger">Password wajib diisi!</span>
                                                    @endif
                                                </div>
                                                <div
                                                    class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button class="btn btn-primary btn-block" type="submit">Masuk</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </main>
            </div>
 
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{url('assets/js/scripts.js')}}"></script>
    </body>
</html>