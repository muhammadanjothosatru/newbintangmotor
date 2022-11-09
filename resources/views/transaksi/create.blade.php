@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/kendaraan-create.css')}}">
@endsection
@section('konten')
<div class="card mt-4">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div id="flasherror" data-flash=" {{$error}}"></div>
    @endforeach
@endif

  @if(Session::has('success'))
  <div id="flash" data-flash="{{session('success')}}"></div>
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
                                    @foreach($all_kendaraan as $data)
                                        <option  value="{{ $data->no_pol }}">{{ $data->no_pol }} - {{$data->tipe}}</option>
                                    @endforeach
                        
            
                                </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="inputHarga"  class="col-sm-2 col-form-label font-form">Harga Akhir</label>
                            <div class="col-sm-10">
                                <input type="text" name="harga_akhir" required="required" class="form-control form-control-size" placeholder="Masukkan Harga Akhir" id="hargaakhir">
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputKomisi"  class="col-sm-2 col-form-label font-form">Komisi</label>
                            <div class="col-sm-10">
                                <input type="text" name="komisi" required="required" class="form-control form-control-size" placeholder="Masukkan Komisi" id="komisi">
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

                            <select class="select2 col-sm-12" required="required"name="metode_pembayaran" onchange="selectmetode(this); checkLunas();" data-placeholder="Pilih Metode Pembayaran" data-minimum-results-for-search="Infinity">
                                <option></option>
                                <option value="Tunai">Tunai</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: none;"  id="divketacc">
                        <label for="keteranganbaru"  class="pl-0 col-sm-2 col-form-label font-form">Bank</label>
                        <div id="keteranganbaru" class="pl-0 col-sm-10">
                            <select class="select2 col-sm-12" name="keterangan" style="width:100% !important;" data-placeholder="Pilih Bank Pembayaran" data-minimum-results-for-search="Infinity" id="keteranganacc" disabled>
                                <option></option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BCA">BCA</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row" style="display: none;" id="divnokontrak">
                        <label for="inputDiskon"  class="pl-0 col-sm-2 col-form-label font-form">Nomor Kontrak</label>
                            <div class=" pl-0 col-sm-10 col-form-label">
                                <input type="text" name="no_kontrak" value="-"  class="form-control form-control-size" placeholder="Masukkan Nomor Kontrak" id="nokontrak" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row"  style="display: none;"  id="divuangdp">
                        <label for="inputHarga"  class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Uang Muka</label>
                            <div class=" pl-0 col-sm-10">
                                <input type="text" name="uang_dp" value="{{ old('uang_dp') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Uang Muka" id="uangmuka" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row"  style="display: none;"  id="divangsuran">
                        <label for="inputHarga"  class="pl-0 col-sm-2 col-form-label font-form">Angsuran</label>
                            <div class="pl-0 col-sm-10">
                                <input type="text" name="bulan_angsuran" value="{{ old('bulan_angsuran') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Bulan Angsuran" id="angsuran" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row"  style="display: none;"  id="divlunas">
                        <div class="pl-0 col-sm-2 col-form-label"></div>
                        <div class="pl-0 col-sm-10"  style="padding-left: 25px !important;">
                            <input class="form-check-input" name="cb_lunas" style="position: relative !important;" type="checkbox" onchange="checkLunas()" id="cbLunas" checked>
                            <label class="pl-1 form-check-label" for="cbLunas">Pembayaran Telah Lunas</label>
                        </div>
                    </div>
                    <div class="mb-3 row"  style="display: none;"  id="divdplunas">
                        <label for="inputHarga"  class=" pl-0 col-sm-2 col-form-label font-form">Pembayaran Awal</label>
                            <div class="pl-0 col-sm-10">
                                <input type="text" name="dp_tunai" value="{{ old('dp_tunai') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Pembayaran Awal" id="pembayaranawal" disabled>
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputAlamat" class=" pl-0 pr-0 col-sm-2 col-form-label font-form">Keterangan</label>
                        <div class="pl-0 col-sm-10">
                            <textarea class="form-control textarea-control-size" required="required" name="keterangan_lain" placeholder="Masukkan Keterangan" id="keterangan"></textarea>
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
            document.getElementById('divlunas').style.display = "flex";
            document.getElementById('divdplunas').style.display = "flex";
            document.getElementById('divangsuran').style.display = "none";
            document.getElementById('divuangdp').style.display = "none";
            document.getElementById('divketacc').style.display = "none";
            $('#acc').prop('disabled', true);
            $('#uangmuka').prop('disabled', true);
            $('#angsuran').prop('disabled', true);
            $('#keteranganacc').prop('disabled', true);
        } else if(metodedipilih.value=='Kredit'){
            document.getElementById('divangsuran').style.display = "flex";
            document.getElementById('divuangdp').style.display = "flex";
            document.getElementById('divketacc').style.display = "flex";
            document.getElementById('divlunas').style.display = "none";
            document.getElementById('divdplunas').style.display = "none";
            $('#acc').prop('disabled', false);
            $('#uangmuka').prop('disabled', false);
            $('#angsuran').prop('disabled', false);
            $('#pembayaranawal').prop('disabled', true);
            $('#keteranganacc').prop('disabled', false);
        }
    };
    
    function checkLunas(){
        var state = document.getElementById("cbLunas").checked;
        if(state){
            $('#pembayaranawal').prop('disabled', true);
        } else {
            $('#pembayaranawal').prop('disabled', false);
        }
    };

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
    };

    var hargaakhir = document.getElementById('hargaakhir');
    hargaakhir.addEventListener('keyup', function(e){
        hargaakhir.value = currency(this.value, 'Rp')
    });

    var komisi = document.getElementById('komisi');
    komisi.addEventListener('keyup', function(e){
        komisi.value = currency(this.value, 'Rp')
    });

    var uang_dp = document.getElementById('uangmuka');
    uang_dp.addEventListener('keyup', function(e){
        uang_dp.value = currency(this.value, 'Rp')
    });

    var dp_tunai = document.getElementById('pembayaranawal');
    dp_tunai.addEventListener('keyup', function(e){
        dp_tunai.value = currency(this.value, 'Rp')
    });
</script>


@endsection