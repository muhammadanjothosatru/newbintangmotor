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
        </div>
        
        @if($newitems->count() > 0)
        <div class="product-grid">
        @foreach($newitems as $data)
            <div class="showcase">
                <div class="showcase-banner">
                    <img src="{{asset('storage/foto_kendaraan/'.$data->foto[0])}}" alt="MEN Yarn Fleece Full-Zip Jacket" class="product-img default"
                    width="300">
                    <img src="{{asset('storage/foto_kendaraan/'.$data->foto[0])}}" alt="MEN Yarn Fleece Full-Zip Jacket" class="product-img hover"
                    width="300">
                
                    <div class="showcase-actions">
                
                    <button class="btn-action">
                        <i class="fas fa-eye"></i>
                    </button>
                
                    <button class="btn-action">
                        <i class="fas fa-comment"></i>
                    </button>
                
                    </div>
                </div>
                
                <div class="showcase-content">
                    <a href="#" class="showcase-category" style="margin: 0">{{$data->jenis}}</a>
                
                    <h3>
                    <a href="#" class="showcase-title" style="margin: 0">{{$data->judul}}</a>
                    </h3>
                
                    <div class="price-box">
                    <p class="price">{{ $data->harga_jual }}</p>
                    </div>
                
                </div>
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