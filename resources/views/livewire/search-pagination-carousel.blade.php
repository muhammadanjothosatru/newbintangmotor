<div>
    <input type="text" class="form-control mb-4" placeholder="Cari Nama Promo" wire:model="searchTerm" />
    <div class="product-grid-carousel">
        @foreach ($carousel as $data)
            <div class="border card pl-0 pr-0">
                <div class="row g-0" style="height: 100px;  overflow: hidden; ">
                    <div class="col-md-4 pr-0" style="display: flex; align-items: center;">
                        <img class="card-img-top" height="100%;" width="auto" style="object-fit: cover;" src="{{ asset('storage/foto_carousel/' . $data->foto) }}"
                            alt="Card image cap">
                    </div>
                    <div class="col-md-8 pl-0" style="display: flex; align-items: center;">
                        <div class="card-body">
                            <h6 class="card-title mb-3">{{ $data->namapromo }}</h6>
                            <div>
                                <form id="{{ preg_replace('/\s+/', '', $data->id) }}" class="p-0"
                                    action="{{ route('carousel.destroy', $data->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('carousel.edit', $data->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fas fa-pen mr-2"></i>Edit</a>
                                    <button class='delete btn btn-danger btn-sm mr-2' value="{{ $data->id }}"
                                        onclick="event.preventDefault(); dosomething(this.value);" type="submit"><i
                                            class="far fa-trash-alt mr-2"></i> Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $carousel->links('livewire.pagination') }}
</div>
