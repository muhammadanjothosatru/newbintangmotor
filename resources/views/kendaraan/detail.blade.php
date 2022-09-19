@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/kendaraan-create.css')}}">
@endsection
@section('konten')
<div class="card">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div id="flasherror" data-flash=" {{$error}}"></div>
    @endforeach
@endif

  @if(Session::has('success'))
  <div id="flash" data-flash="{{session('success')}}"></div>
  @endif
  
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Detail Kendaraan</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <a href="{{ route('kendaraan.edit',$kendaraan->no_pol) }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-pen mr-2"></i>Ubah</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNoPol"  class="col-sm-2 col-form-label font-form">No. Pol.</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control-plaintext font-data" id="no_pol" readonly value="{!! $kendaraan->no_pol !!}"></input>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNamaPemilik"  class="col-sm-2 col-form-label font-form">Nama Pemilik</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="nama_pemilik" readonly value="{!! $kendaraan->nama_pemilik !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Nama Pemilik" id="namapemilik">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control-plaintext font-data" readonly required="required" name="alamat" placeholder="Masukkan Alamat Pemilik" id="alamat">{!! $kendaraan->alamat!!}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNamaPemilik"  class="col-sm-2 col-form-label font-form">Merk</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="nama_pemilik" readonly value="{!! $kendaraan->merk !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Nama Pemilik" id="namapemilik">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTipe"  class="col-sm-2 col-form-label font-form">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" name="tipe" readonly value="{!! $kendaraan->tipe!!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Tipe Kendaraan" id="tipe">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNamaPemilik"  class="col-sm-2 col-form-label font-form">Jenis</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="nama_pemilik" readonly value="{!! $kendaraan->jenis !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Nama Pemilik" id="namapemilik">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputModel"  class="col-sm-2 col-form-label font-form">Model</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" readonly value="{!! $kendaraan->model !!}" required="required"class="form-control-plaintext font-data" placeholder="Masukkan Model Kendaraan" id="model">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTahun"  class="col-sm-2 col-form-label font-form">Tahun Pemb.</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="tahun_pembuatan" readonly value="{!! $kendaraan->tahun_pembuatan !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Tahun Pembuatan Kendaraan" id="tahun">
                        </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="inputModel"  class="col-sm-2 col-form-label font-form">Cabang</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" readonly value="{!! $kendaraan->users->cabang->nama !!}" required="required"class="form-control-plaintext font-data" placeholder="Masukkan Model Kendaraan" id="model">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNoRangka"  class="col-sm-2 col-form-label font-form">No. Rangka</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="no_rangka" readonly value="{!! $kendaraan->no_rangka !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Nomor Rangka" id="norangka">
                        </div>
                </div>
            </div>
            <div class="col-6"> 
                <div class="mb-3 row">
                    <label for="inputNoMesin"  class="col-sm-2 col-form-label font-form">No. Mesin</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="no_mesin"  readonly value="{!! $kendaraan->no_mesin !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Nomor Mesin" id="nomesin">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputWarna"  class="col-sm-2 col-form-label font-form">Warna</label>
                        <div class="col-sm-10">
                            <input type="text" name="warna"  readonly value="{!! $kendaraan->warna !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Warna" id="warna">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTahunReg"  class="col-sm-2 col-form-label font-form">Tahun Reg.</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="tahun_registrasi"  readonly value="{!! $kendaraan->tahun_registrasi !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Tahun Registrasi Kendaraan" id="tahunreg">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNoBPKB"  class="col-sm-2 col-form-label font-form">No. BPKB</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="no_bpkb"  readonly value="{!! $kendaraan->no_bpkb !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Nomor BPKB" id="nobpkb">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputHarga"  class="col-sm-2 col-form-label font-form">Harga Beli</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="harga_beli"  readonly value="Rp. {!! number_format($kendaraan->harga_beli, 0, ',', '.')!!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Harga Beli Kendaraan" id="harga">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTanggalMasuk"  class="col-sm-2 col-form-label font-form">Tanggal Masuk</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="tanggal_masuk"  readonly value="{!! $kendaraan->tanggal_masuk->format("d M Y") !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Tanggal Masuk Kendaraan" id="tanggalmasuk">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputSupplier"  class="col-sm-2 col-form-label font-form">Supplier</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier" readonly value="{!! $kendaraan->supplier !!}" required="required" class="form-control-plaintext font-data" placeholder="Masukkan Supplier" id="supplier">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputKeterangan" class="col-sm-2 col-form-label font-form">Keterangan</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control-plaintext font-data" required="required" name="keterangan" placeholder="Masukkan Keterangan Tambahan" id="keterengan">{!! $kendaraan->keterangan !!}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputModel"  class="col-sm-2 col-form-label font-form ">Status</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" readonly value="{!! $kendaraan->status_kendaraan !!}" required="required"class=" form-control-plaintext font-data  "placeholder="Masukkan Model Kendaraan" id="model">
                        </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>


<script type="text/javascript">
    function currency(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length%3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan) {
            separator = sisa ? '.': '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }

    var hargabeli = document.getElementById('harga');
    hargabeli.value = currency(this.value, 'Rp')

</script>

@endsection