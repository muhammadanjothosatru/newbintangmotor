@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/pelanggan-create.css')}}">
@endsection
@section('konten')
<div class="card mt-4">
    @if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif

  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
  	
  @endif
    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Masukkan Detail Pembelian</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('transaksi.index') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="ml-3">
                    <div class="mb-3 row">
                        <label for="inputNama"  class="pl-0 pr-0 mt-2 col-sm-2 col-form-label font-form">Nama</label>
                        <div class="pl-0 pr-0 col-sm-10">
                            <select class="select2 col-sm-12" name="nama" required="required" data-placeholder="Cari Nama Pelanggan">
                                <option ></option>
                                @foreach($pelanggan as $data)
                                <option value="{{$data->id}}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-2 pl-0 col-form-label"></div>
                        <button class="btn btn-primary btn-block col-sm-10 mt-1"><i class="fas fa-plus mr-2"></i>Tambah Pelanggan Baru</button>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputNopol"  class="pl-0 pr-0 mt-2 col-sm-2 col-form-label font-form">No Pol.</label>
                        <div class="pl-0 pr-0 col-sm-10">
                            <select class="select2 col-sm-12" name="no_pol"data-placeholder="Cari Nomor Polisi">
                                <option></option>
                                @foreach($kendaraan as $data)
                                <option  value="{{ $data->no_pol }}">{{ $data->no_pol }} - {{$data->tipe}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputDiskon"  class="pl-0 pr-0 col-sm-2 col-form-label font-form">Diskon</label>
                            <div class=" pl-0 pr-0 col-sm-10">
                                <input type="text" name="diskon" class="form-control form-control-size " placeholder="Masukkan Jumlah Diskon" id="diskon">
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Harga Akhir</label>
                            <div class=" pl-0 pr-0 col-sm-10">
                                <input type="text" name="harga_akhir" required="required" class="form-control form-control-size" placeholder="Masukkan Harga Akhir" id="hargaakhir">
                            </div>
                    </div>
                    <br><br>
                    <div class="mb-3 row">
                        <button class="btn btn-primary btn-block mt-1"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>
                </div>
            </div><div class="col-6">
                <div class="ml-3">
                    <div class="mb-3 row">
                        <label for="metode"  class="pl-0 pr-0 col-sm-2 mt-2 col-form-label font-form">Pembayaran</label>
                        <div id="metode" class="pl-0 pr-0 col-sm-10">
                            <select class="select2 col-sm-12" name="metode"  onchange="selectmetode(this)" data-placeholder="Pilih Metode Pembayaran">
                                <option></option>
                                <option value="0">Tunai</option>
                                <option value="1">Kredit</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputDiskon"  class="pl-0 pr-0 col-sm-2 col-form-label font-form">Nomor Kontrak</label>
                            <div class=" pl-0 pr-0 col-sm-10">
                                <input type="text" name="nokontrak" value="{{ old('nokontrak') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Kontrak" id="nokontrak" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Uang Muka</label>
                            <div class=" pl-0 pr-0 col-sm-10">
                                <input type="text" name="uangmuka" value="{{ old('uangmuka') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Uang Muka" id="uangmuka" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Angsuran</label>
                            <div class=" pl-0 pr-0 col-sm-10">
                                <input type="text" name="angsuran" value="{{ old('angsuran') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Bulan Angsuran" id="angsuran" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Keterangan Acc</label>
                            <div class=" pl-0 pr-0 col-sm-10">
                                <input type="text" name="ketacc" value="{{ old('ketacc') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Keterangan Persetujuan" id="acc" disabled>
                            </div>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>

<script type="text/javascript">
    function selectmetode(metodedipilih){
        if(metodedipilih.value==0){
            $('#nokontrak').prop('disabled', true);
            $('#uangmuka').prop('disabled', true);
            $('#angsuran').prop('disabled', true);
            $('#acc').prop('disabled', true);
        } else if(metodedipilih.value==1){
            $('#nokontrak').prop('disabled', false);
            $('#uangmuka').prop('disabled', false);
            $('#angsuran').prop('disabled', false);
            $('#acc').prop('disabled', false);
        }
    };
</script>

@endsection