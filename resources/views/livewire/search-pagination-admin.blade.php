<div>
    <input type="text" class="form-control mb-4" placeholder="Cari Plat Nomor" wire:model="searchTerm" />
    <div class="product-grid">
        @foreach ($newitems as $data)
            <div>
                <div class="border card pl-0 pr-0">
                    <div style="max-height: 200px; overflow: hidden; display: flex; align-items: center;">
                        <img class="card-img-top" src="{{ asset('storage/foto_kendaraan/' . $data->foto[0]) }}"
                            alt="Card image cap">
                    </div>
                    <div class="card-body" style="height: 180px;">
                        <h5 class="card-title">{{ $data->merk }} {{ $data->tipe }} {{ $data->tahun_pembuatan }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $data->harga_jual }}</h6>
                        <p class="card-text mb-1">{{ $data->no_pol }}</p>
                        <form id="{{preg_replace('/\s+/', '', $data->id)}}" class="p-0" action="{{ route('datamanagement.destroy', $data->id) }}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="{{ route('datamanagement.detail', $data->id ) }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-eye mr-2"></i>Lihat</a>
                            <button class='delete btn btn-danger btn-sm mr-2' value="{{$data->id}}"
                                onclick="event.preventDefault(); dosomething(this.value);" type="submit"><i
                                    class="far fa-trash-alt mr-2"></i> Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $newitems->links('livewire.pagination') }}
</div>
