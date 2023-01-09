@extends('landing.template.master')
@section('landing')

  <main>
    <div class="detail">
    @foreach($newitems as $data)
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
                    @foreach($data->foto as $itemfoto)
                    <div class="carousel-item-detail">
                        <img id="myImg" src="{{asset('storage/foto_kendaraan/'.$itemfoto)}}" class="product-img default" width="375" onclick="showImage(this)">
                    </div>
                    @endforeach
                </div>
            </div>
            <ol class="carousel-indicators-detail" data-carousel-slides-indicator>
                @foreach($data->foto as $itemfoto)
                    <li class="indicator" data-carousel-indicator>
                        <img id="myImg" src="{{asset('storage/foto_kendaraan/'.$itemfoto)}}" class="product-img default" width="375" onclick="showImage(this)">
                    </li>
                @endforeach
              </ol>
            
        </div>
        <div class="showcase-content">
            <form action="">
                <h2>
                    <p class="showcase-title" style="margin: 0">{{$data->judul}}</p>
                </h2>
                <p class="showcase-category" style="margin: 0">{{$data->kilometer}}</p>
                <div class="price-box">
                    <h3 class="price">Rp. {{ number_format($data->harga_jual, 0, ',', '.');}}</h3>
                </div>
                <p class="showcase-category" style="margin: 0">{{$data->deskripsi}}</p>
                <input type="submit" value="WhatsApp" class="btn btn-send">
            </form>
        </div>
    </div>
    @endforeach
    </div>
  </main>
  
    <div id="myModal" onclick="document.getElementById('myModal').style.display='none'" class="modal">
        <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
        <img class="modal-content" id="img">
    </div>

  <script>
    function showImage(element){
    // Get the modal
    var modal = document.getElementById('myModal');
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img");
    modal.style.display = "block";
    modalImg.src = element.src;
    }
</script>
@endsection