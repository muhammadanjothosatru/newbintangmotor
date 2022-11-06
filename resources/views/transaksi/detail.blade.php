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
            <div class="font-form-header mb-3 col-6">Detail Pembelian</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('transaksi.index') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen mr-2"></i>Ubah</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="">
                    <div class="mb-3 row">
                        <label for="inputNama"  class="col-sm-2 col-form-label font-form">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $pelanggan->nama !!}">
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                        <div class="form-floating col-sm-10">
                            <textarea rows="4" class="form-control-plaintext font-data" readonly>{!! $pelanggan->alamat !!}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputNopol"  class="col-sm-2 col-form-label font-form">No Pol.</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $transaksi->kendaraan_no_pol !!}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputNopol"  class="col-sm-2 col-form-label font-form">Merk</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $kendaraan->merk !!}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputNopol"  class="col-sm-2 col-form-label font-form">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $kendaraan->tipe !!}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputNopol"  class="col-sm-2 col-form-label font-form">Jenis</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $kendaraan->jenis !!}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputNopol"  class="col-sm-2 col-form-label font-form">Tahun Pembuatan</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $kendaraan->tahun_pembuatan !!}">
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-6">
                <div class="ml-3">
                    <div class="mb-3 row">
                        <label class="pl-0 col-sm-2 col-form-label font-form">Harga Jual</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="Rp. {!! number_format($transaksi->harga_akhir, 0, ',', '.')!!}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="pl-0 col-sm-2 col-form-label font-form">Komisi</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="Rp. {!! number_format($transaksi->komisi, 0, ',', '.')!!}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="pl-0 col-sm-2 col-form-label font-form">Metode Pembayaran</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $transaksi->metode_pembayaran !!}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="pl-0 col-sm-2 col-form-label font-form">Uang Muka</label>
                        <div class=" col-sm-10">
                            @if($transaksi->metode_pembayaran == 'Tunai')
                                <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="-">
                            @elseif($transaksi->metode_pembayaran == 'Kredit')
                                <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="Rp. {!!number_format($transaksi->uang_dp, 0, ',', '.')!!}">
                            @endif
                            
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="pl-0 col-sm-2 col-form-label font-form">Angsuran</label>
                        <div class=" col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $transaksi->bulan_angsuran !!}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="pl-0 col-sm-2 col-form-label font-form">Keterangan ACC</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $transaksi->keterangan !!}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="pl-0 col-sm-2 col-form-label font-form">Keterangan Lain</label>
                        <div class="col-sm-10">
                            <textarea rows="4" class="form-control-plaintext font-data" readonly>{!! $transaksi->keterangan_lain!!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>


@endsection