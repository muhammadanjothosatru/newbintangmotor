@extends('landing.template.master')
@section('landing')
    <main>

        <section class="home" id="home">
            <div class="carousel" data-carousel>
                <ol class="carousel-indicators" data-carousel-slides-indicator>
                    @foreach ($carousel as $data)
                        <li class="indicator" data-carousel-indicator></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" data-carousel-slides-container>
                    @foreach ($carousel as $data)
                        <div class="carousel-item">
                            <a href="{{ $data->linkpromo }}"><img src="{{ asset('storage/foto_carousel/' . $data->foto) }}"></a>
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
                    @foreach ($jumlahmotor as $data)
                        <h3>{{ 8640 + $data->penjualanmotor }}+</h3>
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
                    @foreach ($jumlahmotor as $data)
                        <h3>{{ 960 + 8640 + $data->penjualanmotor }}+</h3>
                        <p>Kepuasan Pelanggan</p>
                    @endforeach
                </div>
            </div>

            <div class="icons">
                <i class="fas fa-check"></i>
                <div class="content">
                    @foreach ($jumlahkendaraan as $data)
                        <h3>{{ $data->kendaraantersedia }}+</h3>
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

            <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.0496517837805!2d112.40405121510823!3d-7.1202446577419645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77f0b5bba55409%3A0x8739f313495b22c4!2sUD.%20BINTANG%20MOTOR!5e0!3m2!1sid!2sid!4v1672885543227!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

            <form action="">
                <h3 style="padding-bottom: 0;">Punya pertanyaan? Chat sekarang!</h3>
                <textarea placeholder="Masukkan pesan Anda di sini!" class="box" cols="30" rows="10"></textarea>
                <button type="submit" style="padding: 10px; " class="btn btn-send"><i class="fab fa-whatsapp"
                        style="margin-left: 0; margin-right: 1%;"></i>Kirim</button>
            </form>

        </div>

    </section>
@endsection
