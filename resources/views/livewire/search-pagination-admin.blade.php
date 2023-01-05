<div>
    <input type="text"  class="form-control mb-4" placeholder="Cari Plat Nomor" wire:model="searchTerm" />
    <div class="product-grid">
        @foreach($newitems as $data)
        <a style="cursor: pointer;">
            <div class="border card pl-0 pr-0">
                <div style="max-height: 200px; overflow: hidden; display: flex; align-items: center;">
                    <img class="card-img-top"  src="{{asset('storage/foto_kendaraan/'.$data->foto[0])}}" alt="Card image cap">
                </div>
                <div class="card-body" style="height: 150px;">
                    <h5 class="card-title">{{ $data->merk }} {{ $data->tipe }} {{ $data->tahun_pembuatan }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $data->harga_jual }}</h6>
                    <p class="card-text">{{ $data->no_pol }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    {{ $newitems->links('pagination::bootstrap-5') }}
</div>