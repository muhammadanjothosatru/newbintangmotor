<div style="width: 100%;" class="container">
    <div class="sidebar has-scrollbar" style="margin-top: 30px;" data-mobile-menu >
        <div class="sidebar-category" >
            <div class="sidebar-top">
                <h2 class="sidebar-title">Kategori</h2>
                <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
                </button>
            </div>

            <ul class="list-group">
                @foreach($itemCategory as $data)
                <li class="list-group-item {{$data->state}}">
                    <button class="sidebar-accordion-menu" data-accordion-btn wire:click="buttonFilter('{{$data->kategori}}')">
                        <div class="menu-title-flex">
                            <div style="width: 20px;">
                                <i class="fas {{$data->icon}}"></i>
                            </div>
                            <p>{{$data->kategori}}</p>
                        </div>
                    </button>
                </li>
                @endforeach
            </ul>
        </div>
    </div> 
    <div class="product-main" style="width: 100%;"> 
        <div class="container" id="sticky">
            <div class="header-search-container">

            <input type="search" name="search" class="search-field" placeholder="Cari Nama Produk" wire:model="searchTerm" >

            <button class="search-btn">
                <ion-icon name="search-outline"></ion-icon>
            </button>

            </div>
            <select class="filter-minimal">
                @foreach($itemCategory as $data)
                    <option value="{{$data->kategori}}">{{$data->kategori}}</i></option>
                @endforeach
            </select>
        </div>
        
        @if($newitems->count() > 0)
        <div class="product-grid">
        @foreach($newitems as $data)
            <div class="showcase">
                <a href="{{ route('landing.detail', $data->id)}}">
                    <div class="showcase-banner">
                        <img src="{{asset('storage/foto_kendaraan/'.$data->foto[0])}}" alt="MEN Yarn Fleece Full-Zip Jacket" class="product-img default"
                        width="300">
                        <img src="{{asset('storage/foto_kendaraan/'.$data->foto[0])}}" alt="MEN Yarn Fleece Full-Zip Jacket" class="product-img hover"
                        width="300">
                    
                    </div>
                    <div class="showcase-content">
                        <p class="showcase-category" style="margin: 0">{{$data->jenis}}</p>
                        <h3>
                            <p class="showcase-title" style="margin: 0">{{$data->judul}}</p>
                        </h3>
                    
                        <div class="price-box">
                            <p class="price">Rp. {{ number_format($data->harga_jual, 0, ',', '.');}}</p>
                        </div>
                    
                    </div>
                </a>
            </div>
        @endforeach
        </div>  
        @else
        <div style="text-align: center;">
            Tidak ada produk serupa ditemukan
        </div>
        @endif
        <div>
            {{ $newitems->links('livewire.pagination') }} 
        </div>
    </div>
</div>