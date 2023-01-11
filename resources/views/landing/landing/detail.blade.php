@extends('landing.template.master')
@section('landing')
    <main>
        <div class="container-detail">
            <div class="container-back">
                <a href="/" class="btn-back"><i class="fas fa-chevron-left" style="margin-right: 10px"></i>Kembali</a>
                <div class="detail">
                    @foreach ($newitems as $data)
                        <div class="showcase">
                            <div class="carousel-detail" data-carousel-detail>
                                <div>
                                    <a class="carousel-control-prev-detail" data-carousel-button-previous>
                                        <span class="carousel-control-prev-icon"></span>
                                        <span class="sr-only">Sebelumnya</span>
                                    </a>
                                    <a class="carousel-control-next-detail" data-carousel-button-next>
                                        <span class="carousel-control-next-icon"></span>
                                        <span class="sr-only">Selanjutnya</span>
                                    </a>
                                    <div class="carousel-inner-detail" data-carousel-slides-container>
                                        @foreach ($data->foto as $itemfoto)
                                            <div class="carousel-item-detail">
                                                <img id="myImg" src="{{ asset('storage/foto_kendaraan/' . $itemfoto) }}"
                                                    class="product-img default" width="375" onclick="showImage(this)">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <ol class="carousel-indicators-detail" data-carousel-slides-indicator>
                                    @foreach ($data->foto as $itemfoto)
                                        <li class="indicator" data-carousel-indicator>
                                            <img id="myImg" src="{{ asset('storage/foto_kendaraan/' . $itemfoto) }}"
                                                class="product-img default" width="375" onclick="showImage(this)">
                                        </li>
                                    @endforeach
                                </ol>

                            </div>

                            <div class="showcase-content">

                                <form
                                    action="https://wa.me/6285854457796?text=Halo%20saya%20mau%20tanya%20{{ $data->judul }}%20yang%20kilometernya%20{{ $data->kilometer }}">
                                    <h2>
                                        <p class="vehicle-title">{{ $data->judul }}</p>
                                    </h2>
                                    <p class="vehicle-distance" style="margin: 0">KM {{ $data->kilometer }}</p>
                                    <div class="price-box">
                                        <h3 class="vehicle-price">Rp. {{ number_format($data->harga_jual, 0, ',', '.') }}
                                        </h3>
                                    </div>
                                    <p class="vehicle-description">{!! nl2br(e($data->deskripsi)) !!}</p>
                                    <button type="submit" class="btn btn-send"><i class="fab fa-whatsapp"
                                            style="margin-right: 1%;"></i>WhatsApp</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

    <div id="myModal" onclick="document.getElementById('myModal').style.display='none'" class="modal">
        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
        <img class="modal-content" id="img">
    </div>

    <script>
        function showImage(element) {
            // Get the modal
            var modal = document.getElementById('myModal');
            var img = document.getElementById('myImg');
            var modalImg = document.getElementById("img");
            modal.style.display = "block";
            modalImg.src = element.src;
        }
    </script>
@endsection