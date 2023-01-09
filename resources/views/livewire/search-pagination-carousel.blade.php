<div>
    <input type="text"  class="form-control mb-4" placeholder="Cari Nama Promo" wire:model="searchTerm" />
    <div class="product-grid">
        @foreach($carousel as $data)
        <a style="cursor: pointer;">
            <div class="border card pl-0 pr-0">
                <div style="max-height: 200px; overflow: hidden; display: flex; align-items: center;">
                    <img class="card-img-top"  src="{{asset('storage/foto_carousel/'.$data->foto)}}" alt="Card image cap">
                </div>
                <div class="card-body" style="height: 150px;">
                    <h5 class="card-title">{{ $data->namapromo }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $data->linkpromo }}</h6>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    {{ $carousel->links('livewire.pagination') }}
</div>