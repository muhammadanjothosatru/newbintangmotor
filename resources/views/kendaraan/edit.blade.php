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
    <form id="form" action="{{ route('kendaraan.update', $kendaraan->no_pol) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
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
                            @if($kendaraan->status_kendaraan == "Tersedia")
                                <input type="text" name="no_pol"  value="{!! $kendaraan->no_pol !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Polisi" id="no_pol" autocomplete="off" autofocus>
                            @elseif($kendaraan->status_kendaraan == "Terjual")
                                <input type="text" name="no_pol" readonly value="{!! $kendaraan->no_pol !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Polisi" id="no_pol" autocomplete="off" >
                           @endif
                           @if($errors->has('no_pol'))
                                <div class="error"><span class="badge" style="color:red">{{ $errors->first('no_pol') }}</span></div>
                            @endif
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNamaPemilik"  class="col-sm-2 col-form-label font-form">Nama Pemilik</label>
                        <div class="col-sm-10 col-form-label">
                            @if($kendaraan->status_kendaraan == "Tersedia")
                            <input type="text" name="nama_pemilik" value="{!! $kendaraan->nama_pemilik !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nama Pemilik" id="namapemilik" autocomplete="off" >
                            @elseif($kendaraan->status_kendaraan == "Terjual")
                            <input type="text" name="nama_pemilik" value="{!! $kendaraan->nama_pemilik !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nama Pemilik" id="namapemilik" autocomplete="off" autofocus>
                            @endif
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                    <div class="form-floating col-sm-10">
                        <textarea style="overflow:hidden !important;"  class="form-control textarea-control-size" required="required" name="alamat" placeholder="Masukkan Alamat Pemilik" id="alamat">{!! $kendaraan->alamat!!}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Merk</label>
                    <div class="dropdown col-sm-10 mt-1">
                        <select class="select2 selectform"  id="pilihmerk" onchange="selectmetode(3);"  name="merk"  data-placeholder="Pilih Merk" style="width: 100%">
                            <option></option>
                            @foreach($allkendaraan as $data)
                            @if(Auth::user()->role == 0)
                            <option value="{{$data->merk}}" {{ $kendaraan->merk == $data->merk ? 'selected' : '' }}>{{$data->jenis}} - {{$data->merk}}</option>
                            @else
                                <option value="{{$data->merk}}" {{ $kendaraan->merk == $data->merk ? 'selected' : '' }}>{{$data->merk}}</option>
                                @endif
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTipe"  class="col-sm-2 col-form-label font-form">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" name="tipe" value="{!! $kendaraan->tipe !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Tipe Kendaraan" id="tipe">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputJenis" class="col-sm-2 col-form-label font-form">Jenis</label>
                    <div class="dropdown col-sm-10 mt-1">
                        <select class="select2 selectform" id="jenis" name="jenis" onchange="selectmetode(5);" data-placeholder="Pilih Jenis Kendaraan" style="width: 100%">
                            <option></option>
                            <option value="Sepeda Motor"{{ $kendaraan->jenis == 'Sepeda Motor' ? 'selected' : '' }}>Sepeda Motor</option>
                            <option value="Mobil"{{ $kendaraan->jenis == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputModel"  class="col-sm-2 col-form-label font-form">Model</label>
                        <div class="col-sm-10">
                            <input type="text" name="model" value="{!! $kendaraan->model !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Model Kendaraan" id="model">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTahun"  class="col-sm-2 col-form-label font-form">Tahun Pemb.</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="tahun_pembuatan" value="{!! $kendaraan->tahun_pembuatan !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Tahun Pembuatan Kendaraan" id="tahun">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNoRangka"  class="col-sm-2 col-form-label font-form">No. Rangka</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="no_rangka" value="{!! $kendaraan->no_rangka !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Rangka" id="norangka">
                        </div>
                </div>
           <br>
                <div class="row">
                    <button class="btn btn-primary btn-block"><i class="fas fa-save mr-2"></i>Simpan</button>
                </div>
            </div>
            <div class="col-6">
                
                <div class="mb-3 row">
                    <label for="inputNoMesin"  class="col-sm-2 col-form-label font-form">No. Mesin</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="no_mesin" value="{!! $kendaraan->no_mesin !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Mesin" id="nomesin">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputWarna"  class="col-sm-2 col-form-label font-form">Warna</label>
                        <div class="col-sm-10">
                            <input type="text" name="warna" value="{!! $kendaraan->warna !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Warna" id="warna">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTahunReg"  class="col-sm-2 col-form-label font-form">Tahun Reg.</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="tahun_registrasi" value="{!! $kendaraan->tahun_registrasi !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Tahun Registrasi Kendaraan" id="tahunreg">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNoBPKB"  class="col-sm-2 col-form-label font-form">No. BPKB</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="no_bpkb" value="{!! $kendaraan->no_bpkb !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor BPKB" id="nobpkb">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputHarga"  class="col-sm-2 col-form-label font-form">Harga Beli</label>
                        <div class="col-sm-4 ">
                        <input type="text" name="harga_beli" value="Rp. {!! number_format($kendaraan->harga_beli, 0, ',', '.')!!}" required="required" class="form-control form-control-size" placeholder="Masukkan Harga Beli Kendaraan" id="harga">
                        
                    </div>
                    <label for="inputHarga"  class="col-sm-2 col-form-label font-form">Biaya Tambahan</label>
                        <div class="col-sm-4">
                        <input type="text" name="biaya_tambahan" value="0" required="required" class="form-control form-control-size" placeholder="Masukkan Harga Beli Kendaraan" id="biaya_tambahan">
                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputTanggalMasuk"  class="col-sm-2 col-form-label font-form">Tanggal Masuk</label>
                        <div class="col-sm-10 col-form-label">
                            <input type="text" name="tanggal_masuk" value="{{ \Carbon\Carbon::parse($kendaraan->tanggal_masuk)->format('Y-m-d') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Tanggal Masuk Kendaraan" id="tanggalmasuk" onfocus="(this.type='date'); (this.showPicker());"  onblur="(this.type='text')" >
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputSupplier"  class="col-sm-2 col-form-label font-form">Supplier</label>
                        <div class="col-sm-10">
                            <input type="text" name="supplier" value="{!! $kendaraan->supplier !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Supplier" id="supplier">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputKeterangan" class="col-sm-2 col-form-label font-form">Keterangan</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control textarea-control-size" required="required" name="keterangan" placeholder="Masukkan Keterangan Tambahan" id="keterengan">{!! $kendaraan->keterangan !!}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputJenis" class="col-sm-2 col-form-label font-form">Status</label>
                    <div class="dropdown col-sm-10 mt-1">
                        <select class="select2 selectform" id="status_kendaraan" onchange="selectmetode(20);" name="status_kendaraan" data-placeholder="Pilih Jenis Kendaraan" style="width: 100%">
                            <option></option>
                            <option value="Tersedia"{{ $kendaraan->status_kendaraan == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Terjual"{{ $kendaraan->status_kendaraan == 'Terjual' ? 'selected' : '' }}>Terjual</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>


<script type="text/javascript">

    $(document).ready(function() {
        $(".select2").select2();
    }); 

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
    hargabeli.addEventListener('keyup', function(e){
        hargabeli.value = currency(this.value, 'Rp')
    })
    var biaya_tambahan = document.getElementById('biaya_tambahan');
    biaya_tambahan.addEventListener('keyup', function(e){
        biaya_tambahan.value = currency(this.value, 'Rp')
    })

    

    function navigate(origin, sens) {
        var inputs = $('#form').find(':input:enabled:not(:button)');
        var index = inputs.index(origin);
        index += sens;

        console.log(origin);
        console.log(index);
        if (index < 0) {
            index = inputs.length - 1;
        }
        if (index > inputs.length - 1) {
            index = 0;
        }

        if(index == 5){
            $("#pilihmerk" ).select2('open');
        } else if(index == 7){
            $("#jenis" ).select2('open');
        } else if(index == 20){
            $("#status_kendaraan" ).select2('open');
        } else {
            inputs.eq(index).focus();
        }
    }

    $('input').keydown(function(e) {
        if (e.keyCode==38) {
            navigate(e.target, -1);
        }
        if (e.keyCode==40) {
            navigate(e.target, 1);
        }
    });

    $('textarea').keydown(function(e) {
        if (e.keyCode==38) {
            navigate(e.target, -1);
        }
        if (e.keyCode==40) {
            navigate(e.target, 1);
        }
    });
   
    function selectmetode(id){
        $(document).ready(function() {
            if(id == 3){
                document.getElementById("tipe").focus();
            } else if(id==5){
                document.getElementById("model").focus();
            }
        });
    };
    


</script>

@endsection