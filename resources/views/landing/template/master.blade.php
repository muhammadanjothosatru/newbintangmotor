<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bintang Motor</title>

    <!--
    - custom css link
  -->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



    <!--
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @livewireStyles
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</head>

<body>
    <header>

        <div class="header-top">

            <div class="container">

                <ul class="header-social-container">

                    <li>
                        <a href="https://www.facebook.com/showroombintangmotor/" class="social-link">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.youtube.com/@bintangmotorlmg" class="social-link">
                            <ion-icon name="logo-youtube"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com/bintangmotorlmg/" class="social-link">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="http://wa.me/6285780938091" class="social-link">
                            <ion-icon name="logo-whatsapp"></ion-icon>
                        </a>
                    </li>

                </ul>

                <div class="header-alert-news">
                    <a href="/" class="header-logo">
                        <img src="{{ asset('images/logo2.png') }}" alt="" width="160">
                    </a>
                </div>

                <div class="header-top-actions">
                    <div>
                        <a href="#footer" style="cursor: pointer; color:var(--eerie-black);">
                            Kontak
                        </a>
                    </div>

                </div>

            </div>

        </div>


    </header>
    @yield('landing')
    <footer id="footer">

        <div class="footer-nav">

            <div class="container">

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Kategori Populer</h2>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Motor</a>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Mobil</a>
                    </li>

                    <br>

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Layanan</h2>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Jual Kendaraan</a>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Beli Kendaraan</a>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Tukar Tambah</a>
                    </li>

                </ul>

                <ul class="footer-nav-list-cabang">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Cabang</h2>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Lamongan</a>
                        <a style="color: var(--sonic-silver)">Jl. Basuki Rahmat No.129A, Rangge, Sukorejo, Kec.
                            Lamongan, Kabupaten Lamongan, Jawa Timur 62216</a>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Babat</a>
                        <a style="color: var(--sonic-silver);">Jl. Raya Pendem No.11A, Plaosan, Kec. Babat, Kabupaten
                            Lamongan, Jawa Timur 62271</a>
                    </li>

                </ul>

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Pembayaran</h2>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Kredit</a>
                    </li>

                    <li class="footer-nav-item">
                        <a href="#" class="footer-nav-link">Cash</a>
                    </li>

                </ul>

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Kontak</h2>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <ion-icon name="location-outline"></ion-icon>
                        </div>

                        <address class="content">
                            Jl. Basuki Rahmat No.129A, Rangge, Sukorejo,
                            Kec. Lamongan, Kabupaten Lamongan, Jawa Timur 62216
                        </address>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <ion-icon name="call-outline"></ion-icon>
                        </div>
                        <div>
                            <a href="https://wa.me/6282233300087" class="footer-nav-link">0822 3330 0087</a>
                            <a href="http://wa.me/6285854457796" class="footer-nav-link">0858 5445 7796</a>
                            <a href="http://wa.me/6282227464748" class="footer-nav-link">0822 2746 4748</a>
                        </div>
                    </li>

                    <li class="footer-nav-item flex">
                        <div class="icon-box">
                            <ion-icon name="mail-outline"></ion-icon>
                        </div>

                        <a href="mailto:bmlamongan2020@gmail.com" class="footer-nav-link">bmlamongan2020@gmail.com</a>
                    </li>

                </ul>

                <ul class="footer-nav-list">

                    <li class="footer-nav-item">
                        <h2 class="nav-title">Follow Us</h2>
                    </li>

                    <li>
                        <ul class="social-link">

                            <li class="footer-nav-item">
                                <a href="https://www.facebook.com/showroombintangmotor/" class="footer-nav-link">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="https://www.youtube.com/@bintangmotorlmg" class="footer-nav-link">
                                    <ion-icon name="logo-youtube"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="https://www.instagram.com/bintangmotorlmg/" class="footer-nav-link">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                </a>
                            </li>

                            <li class="footer-nav-item">
                                <a href="http://wa.me/6285780938091" class="footer-nav-link">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>

            </div>

        </div>

        <div class="footer-bottom">

            <div class="container">

                {{-- <img src="{{asset('image/mandiri.png')}}" alt="payment method" class="payment-img"> --}}

                <p class="copyright">
                    Copyright &copy; <a href="#">Bintang Motor</a> all rights reserved.
                </p>

            </div>

        </div>

    </footer>
</body>

<script src="{{ asset('landing/assets/js/script.js') }}"></script>
@livewireScripts
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>
