@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/kendaraan-create.css')}}">
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
    <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="m-4">
        <div class="row">
            <div class="font-form-header mb-3 col-6">Masukkan Detail Pembelian</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('transaksi.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="">
                    <div class="mb-3 row">
                        <label for="inputNama"  class=" mt-2 col-sm-2 col-form-label font-form">Nama</label>
                        <div class="col-sm-10">
                            <select class="select2 col-sm-12" name="nama" required="required" data-placeholder="Cari Nama Pelanggan">
                                <option ></option>
                                @foreach($pelanggan as $data)
                                <option value="{{$data->id}}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-2 col-form-label"></div>
                        <div class="font-form-header col-sm-10 mt-1">
                            <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-block"><i class="fas fa-plus mr-2"></i>Tambah Pelanggan Baru</a>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputNopol"  class="mt-2 col-sm-2 col-form-label font-form">No Pol.</label>
                        <div class="col-sm-10">
                            <select class="select2 col-sm-12" name="no_pol"data-placeholder="Cari Nomor Polisi">
                                <option></option>
                                @foreach($kendaraan as $data)
                                <option  value="{{ $data->no_pol }}">{{ $data->no_pol }} - {{$data->tipe}}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputDiskon"  class="col-sm-2 col-form-label font-form">Diskon</label>
                            <div class="col-sm-10">
                                <input type="text" name="diskon" class="form-control form-control-size " placeholder="Masukkan Jumlah Diskon" id="diskon">
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class="col-sm-2 col-form-label font-form">Harga Akhir</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga_akhir" required="required" class="form-control form-control-size" placeholder="Masukkan Harga Akhir" id="hargaakhir">
                            </div>
                    </div>
                    <br>
                    <div class="mb-3 row">
                        <button class="btn btn-primary btn-block mr-3 ml-3" type="submit"><i class="fas fa-save mr-2"></i>Simpan</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="ml-3">
                    <div class="mb-3 row">
                        <label for="metode"  class="pl-0 col-sm-2 col-form-label font-form">Pembayaran</label>
                        <div id="metode" class="pl-0 col-sm-10">

                            <select class="select2 col-sm-12" name="metode_pembayaran" onchange="selectmetode(this)" data-placeholder="Pilih Metode Pembayaran" data-minimum-results-for-search="Infinity">
                                <option></option>
                                <option value="Tunai">Tunai</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputDiskon"  class="pl-0 col-sm-2 col-form-label font-form">Nomor Kontrak</label>
                            <div class=" pl-0 col-sm-10 col-form-label">
                                <input type="text" name="no_kontrak" value="{{ old('no_kontrak') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Kontrak" id="nokontrak" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Uang Muka</label>
                            <div class=" pl-0 col-sm-10">
                                <input type="text" name="uang_dp" value="{{ old('uang_dp') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Uang Muka" id="uangmuka" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class=" pl-0 col-sm-2 col-form-label font-form">Angsuran</label>
                            <div class=" pl-0 col-sm-10">
                                <input type="text" name="bulan_angsuran" value="{{ old('bulan_angsuran') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Bulan Angsuran" id="angsuran" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputHarga"  class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Keterangan Acc</label>
                            <div class=" pl-0 col-form-label col-sm-10">
                                <input type="text" name="keterangan" value="{{ old('keterangan') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Keterangan Persetujuan" id="acc" disabled>
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
        if(metodedipilih.value=='Tunai'){
            $('#nokontrak').prop('disabled', true);
            $('#uangmuka').prop('disabled', true);
            $('#angsuran').prop('disabled', true);
            $('#acc').prop('disabled', true);
        } else if(metodedipilih.value=='Kredit'){
            $('#nokontrak').prop('disabled', false);
            $('#uangmuka').prop('disabled', false);
            $('#angsuran').prop('disabled', false);
            $('#acc').prop('disabled', false);
        }
    };
</script>

@endsection