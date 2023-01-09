@extends('landing.template.master')
@section('landing')

  {{-- <div class="overlay" data-overlay></div> --}}

  <!--
    - HEADER
  -->

  <header>

    <div class="header-top">

      <div class="container">

        <ul class="header-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-whatsapp"></ion-icon>
            </a>
          </li>

        </ul>

        <div class="header-alert-news">
          <a href="/" class="header-logo">
            <img src="images/logo2.png" alt="" width="160">
          </a>
        </div>

        <div class="header-top-actions">

          <div>
            <a>
                Kontak
            </a>
          </div>

        </div>

      </div>

    </div>



    {{-- <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="bag-handle-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn">
        <ion-icon name="home-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>

        <span class="count">0</span>
      </button>

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbayr" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="#" class="menu-title">Home</a>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Men's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shirt</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shorts & Jeans</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Safety Shoes</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Wallet</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Women's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Dress & Frock</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Makeup Kit</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Jewelry</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Couple Rings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bracelets</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Perfume</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Clothes Perfume</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Deodorant</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Flower Fragrance</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Air Freshener</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Blog</a>
        </li>

        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>

      </ul>

      <div class="menu-bottom">

        <ul class="menu-category-list">

          <li class="menu-category">

            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Language</p>

              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>

              <li class="submenu-category">
                <a href="#" class="submenu-title">English</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Espa&ntilde;ol</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">Fren&ccedil;h</a>
              </li>

            </ul>

          </li>

          <li class="menu-category">
            <button class="accordion-menu" data-accordion-btn>
              <p class="menu-title">Currency</p>
              <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
            </button>

            <ul class="submenu-category-list" data-accordion>
              <li class="submenu-category">
                <a href="#" class="submenu-title">USD &dollar;</a>
              </li>

              <li class="submenu-category">
                <a href="#" class="submenu-title">EUR &euro;</a>
              </li>
            </ul>
          </li>

        </ul>

        <ul class="menu-social-container">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

        </ul>

      </div>

    </nav> --}}

  </header>

  <!--
    - MAIN
  -->

  <main>

    <!--
      - BANNER
    -->

    {{-- <div class="banner">

      <div class="container">

        <div class="slider-container has-scrollbar">

          <div class="slider-item">

            <img src="./assets/images/banner-1.jpg" alt="women's latest fashion sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Trending item</p>

              <h2 class="banner-title">Women's latest fashion sale</h2>

              <p class="banner-text">
                starting at &dollar; <b>20</b>.00
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

          <div class="slider-item">

            <img src="./assets/images/banner-2.jpg" alt="modern sunglasses" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Trending accessories</p>

              <h2 class="banner-title">Modern sunglasses</h2>

              <p class="banner-text">
                starting at &dollar; <b>15</b>.00
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

          <div class="slider-item">

            <img src="./assets/images/banner-3.jpg" alt="new fashion summer sale" class="banner-img">

            <div class="banner-content">

              <p class="banner-subtitle">Sale Offer</p>

              <h2 class="banner-title">New fashion summer sale</h2>

              <p class="banner-text">
                starting at &dollar; <b>29</b>.99
              </p>

              <a href="#" class="banner-btn">Shop now</a>

            </div>

          </div>

        </div>

      </div>

    </div> --}}
    <section class="home" id="home">
      <div class="carousel" data-carousel>
        <ol class="carousel-indicators" data-carousel-slides-indicator>
          @foreach($carousel as $data)
          <li class="indicator" data-carousel-indicator></li>
          @endforeach
        </ol>
        <div class="carousel-inner" data-carousel-slides-container>
          @foreach($carousel as $data)
            <div class="carousel-item">
              <a href="{{$data->linkpromo}}"><img src="{{asset('storage/foto_carousel/'.$data->foto)}}"></a>
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" data-carousel-button-previous>
          <span class="carousel-control-prev-icon"></span>
          <span class="sr-only">Sebelumnya</span>
        </a>
        <a class="carousel-control-next" data-carousel-button-next>
          <span class="carousel-control-next-icon"></span>
          <span class="sr-only">Selanjutnya</span>
        </a>
      </div>
    </section>

    <!-- 
      INFO ICON
    -->
    <section class="icons-container">

      <div class="icons">
          <i class="fas fa-motorcycle"></i>
          <div class="content">
            @foreach($jumlahmotor as $data)
              <h3>{{8640+$data->penjualanmotor}}+</h3>
              <p>Sepeda Motor Terjual</p>
            @endforeach
          </div>
      </div>
  
      <div class="icons">
          <i class="fas fa-car"></i>
          <div class="content">
            <h3>960+</h3>
            <p>Mobil Terjual</p>
          </div>
      </div>
  
      <div class="icons">
          <i class="fas fa-users"></i>
          <div class="content">
            @foreach($jumlahmotor as $data)
              <h3>{{960+8640+$data->penjualanmotor}}+</h3>
              <p>Kepuasan Pelanggan</p>
            @endforeach
          </div>
      </div>
  
      <div class="icons">
          <i class="fas fa-check"></i>
          <div class="content">
            @foreach($jumlahkendaraan as $data)
              <h3>{{$data->kendaraantersedia}}+</h3>
              <p>Kendaraan Tersedia</p>
            @endforeach
          </div>
      </div>
  
    </section>


    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container">
          @livewire('search-pagination-landing')
      </div>

    </div>


  

  </main>

  <!--
      CONTACT
    -->
    <section class="contact" id="contact">

      <h1 class="heading"><span>Hubungi</span> kami</h1>
  
      <div class="row">
  
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0496517837805!2d112.40405121510823!3d-7.1202446577419645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77f0b5bba55409%3A0x8739f313495b22c4!2sUD.%20BINTANG%20MOTOR!5e0!3m2!1sid!2sid!4v1672885543227!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  
          <form action="">
              <h3>kirim pesan sekarang!</h3>
              <textarea placeholder="Pesan anda" class="box" cols="30" rows="10"></textarea>
              <input type="submit" value="kirim" class="btn btn-send">
          </form>
  
      </div>
  
    </section>

  <!--
    - FOOTER
  -->

  <footer>

    {{-- <div class="footer-category">

      <div class="container">

        <h2 class="footer-category-title">Brand directory</h2>

        <div class="footer-category-box">

          <h3 class="category-box-title">Fashion :</h3>

          <a href="#" class="footer-category-link">T-shirt</a>
          <a href="#" class="footer-category-link">Shirts</a>
          <a href="#" class="footer-category-link">shorts & jeans</a>
          <a href="#" class="footer-category-link">jacket</a>
          <a href="#" class="footer-category-link">dress & frock</a>
          <a href="#" class="footer-category-link">innerwear</a>
          <a href="#" class="footer-category-link">hosiery</a>

        </div>

        <div class="footer-category-box">
          <h3 class="category-box-title">footwear :</h3>
        
          <a href="#" class="footer-category-link">sport</a>
          <a href="#" class="footer-category-link">formal</a>
          <a href="#" class="footer-category-link">Boots</a>
          <a href="#" class="footer-category-link">casual</a>
          <a href="#" class="footer-category-link">cowboy shoes</a>
          <a href="#" class="footer-category-link">safety shoes</a>
          <a href="#" class="footer-category-link">Party wear shoes</a>
          <a href="#" class="footer-category-link">Branded</a>
          <a href="#" class="footer-category-link">Firstcopy</a>
          <a href="#" class="footer-category-link">Long shoes</a>
        </div>

        <div class="footer-category-box">
          <h3 class="category-box-title">jewellery :</h3>
        
          <a href="#" class="footer-category-link">Necklace</a>
          <a href="#" class="footer-category-link">Earrings</a>
          <a href="#" class="footer-category-link">Couple rings</a>
          <a href="#" class="footer-category-link">Pendants</a>
          <a href="#" class="footer-category-link">Crystal</a>
          <a href="#" class="footer-category-link">Bangles</a>
          <a href="#" class="footer-category-link">bracelets</a>
          <a href="#" class="footer-category-link">nosepin</a>
          <a href="#" class="footer-category-link">chain</a>
          <a href="#" class="footer-category-link">Earrings</a>
          <a href="#" class="footer-category-link">Couple rings</a>
        </div>

        <div class="footer-category-box">
          <h3 class="category-box-title">cosmetics :</h3>
        
          <a href="#" class="footer-category-link">Shampoo</a>
          <a href="#" class="footer-category-link">Bodywash</a>
          <a href="#" class="footer-category-link">Facewash</a>
          <a href="#" class="footer-category-link">makeup kit</a>
          <a href="#" class="footer-category-link">liner</a>
          <a href="#" class="footer-category-link">lipstick</a>
          <a href="#" class="footer-category-link">prefume</a>
          <a href="#" class="footer-category-link">Body soap</a>
          <a href="#" class="footer-category-link">scrub</a>
          <a href="#" class="footer-category-link">hair gel</a>
          <a href="#" class="footer-category-link">hair colors</a>
          <a href="#" class="footer-category-link">hair dye</a>
          <a href="#" class="footer-category-link">sunscreen</a>
          <a href="#" class="footer-category-link">skin loson</a>
          <a href="#" class="footer-category-link">liner</a>
          <a href="#" class="footer-category-link">lipstick</a>
        </div>

      </div>

    </div> --}}

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
            <a style="color: var(--sonic-silver)">Jl. Basuki Rahmat No.129A, Rangge, Sukorejo, Kec. Lamongan, Kabupaten Lamongan, Jawa Timur 62216</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Babat</a>
            <a style="color: var(--sonic-silver);">Jl. Raya Pendem No.11A, Plaosan, Kec. Babat, Kabupaten Lamongan, Jawa Timur 62271</a>
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

            <a href="tel:+607936-8058" class="footer-nav-link">0822 3330 0087</a>
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
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-facebook"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-twitter"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-linkedin"></ion-icon>
                </a>
              </li>

              <li class="footer-nav-item">
                <a href="#" class="footer-nav-link">
                  <ion-icon name="logo-instagram"></ion-icon>
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

  <!--
    - custom js link
  -->
  <script src="{{asset('landing/assets/js/script.js')}}"></script>

  <script>
    document.querySelector('.home').onmousemove = (e) =>{

      document.querySelectorAll('.home-parallax').forEach(elm =>{

        let speed = elm.getAttribute('data-speed');
        console.log(speed);

        let x = (window.innerWidth - e.pageX * speed) / 90;
        let y = (window.innerHeight - e.pageY * speed) / 90;

        elm.style.transform = `translateX(${y}px) translateY(${x}px)`;

      });

    };


    document.querySelector('.home').onmouseleave = (e) =>{

      document.querySelectorAll('.home-parallax').forEach(elm =>{

        elm.style.transform = `translateX(0px) translateY(0px)`;

      });

    };

  </script>
  <!--
    - ionicon link
  -->
  @livewireScripts
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  @endsection