@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/pelanggan-create.css')}}">
@endsection
@section('konten')
<div class="card">
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
    <form action="{{ route('kendaraan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Masukkan Detail Kendaraan</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNoPol"  class="col-sm-2 col-form-label font-form">No. Pol.</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_pol" value="{{ old('no_pol') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Polisi" id="nopol">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNamaPemilik"  class="col-sm-2 col-form-label font-form">Nama Pemilik</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nama Pemilik" id="namapemilik">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control textarea-control-size" required="required" name="alamat" placeholder="Masukkan Alamat Pemilik" id="alamat">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Merk</label>
                    <div class="dropdown col-sm-10 mt-1">
                        <select class="select2 selectform" name="merk" data-placeholder="Pilih Merk" style="width: 100%" data-minimum-results-for-search="Infinity">
                            <option></option>
                            <option value="Honda">Honda</option>
                            <option value="Yamaha">Yamaha</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Kawasaki">Kawasaki</option>
                            <option value="Yagyu">Yagyu</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTipe"  class="col-sm-2 col-form-label font-form">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" name="tipe" value="{{ old('tipe') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Tipe Kendaraan" id="tipe">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputJenis" class="col-sm-2 col-form-label font-form">Jenis</label>
                    <div class="dropdown col-sm-10 mt-1">
                        <select class="select2 selectform" id="jenis" name="jenis" data-placeholder="Pilih Jenis Kendaraan" style="width: 100%" data-minimum-results-for-search="Infinity">
                            <option></option>
                            <option value="Sepeda Motor">Sepeda Motor</option>
                            <option value="Mobil">Mobil</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputModel"  class="col-sm-2 col-form-label font-form">Model</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" value="{{ old('model') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Model Kendaraan" id="model">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTahun"  class="col-sm-2 col-form-label font-form">Tahun Pemb.</label>
                        <div class="col-sm-10">
                            <input type="text" name="tahun_pembuatan" value="{{ old('tahun_pembuatan') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Tahun Pembuatan Kendaraan" id="tahun">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputDaya"  class="col-sm-2 col-form-label font-form">CC Kendaraan</label>
                        <div class="col-sm-10">
                            <input type="text" name="daya_listrik" value="{{ old('daya_listrik') }}" required="required" class="form-control form-control-size" placeholder="Masukkan CC Kendaraan" id="daya">
                        </div>
                </div>
                <div class="row">
                    <button class="btn btn-primary btn-block"><i class="fas fa-save mr-2"></i>Simpan</button>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNoRangka"  class="col-sm-2 col-form-label font-form">No. Rangka</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_rangka" value="{{ old('no_rangka') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Rangka" id="norangka">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNoMesin"  class="col-sm-2 col-form-label font-form">No. Mesin</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_mesin" value="{{ old('no_mesin') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Mesin" id="nomesin">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputWarna"  class="col-sm-2 col-form-label font-form">Warna</label>
                        <div class="col-sm-10">
                            <input type="text" name="warna" value="{{ old('warna') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Warna" id="warna">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTahunReg"  class="col-sm-2 col-form-label font-form">Tahun Reg.</label>
                        <div class="col-sm-10">
                            <input type="text" name="tahun_registrasi" value="{{ old('tahun_registrasi') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Tahun Registrasi Kendaraan" id="tahunreg">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNoBPKB"  class="col-sm-2 col-form-label font-form">No. BPKB</label>
                        <div class="col-sm-10">
                            <input type="text" name="no_bpkb" value="{{ old('no_bpkb') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor BPKB" id="nobpkb">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputHarga"  class="col-sm-2 col-form-label font-form">Harga Beli</label>
                        <div class="col-sm-10">
                            <input type="text" name="harga_beli" value="{{ old('harga_beli') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Harga Beli Kendaraan" id="harga">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTanggalMasuk"  class="col-sm-2 col-form-label font-form">Tanggal Masuk</label>
                        <div class="col-sm-10">
                            <input type="text" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Tanggal Masuk Kendaraan" onfocus="(this.type='date')" id="tanggalmasuk">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputSupplier"  class="col-sm-2 col-form-label font-form">Supplier</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier" value="{{ old('supplier') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Supplier" id="supplier">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputKeterangan" class="col-sm-2 col-form-label font-form">Keterangan</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control textarea-control-size" required="required" name="keterangan" placeholder="Masukkan Keterangan Tambahan" id="keterengan">{{ old('keterangan') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>

@endsection