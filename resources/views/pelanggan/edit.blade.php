@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/edit-pelanggan.css')}}">
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
    <form action="{{ route('pelanggan.edit', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Detail Pelanggan</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <a href="{{ route('pelanggan.ubah',$pelanggan->id) }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-pen mr-2"></i>Ubah</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNIK"  class="col-sm-2 col-form-label font-form">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $pelanggan->nik !!}">
                        </div>
                </div>
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
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">No. HP</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $pelanggan->nomor_hp !!}">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto KTP</label>
                    <div class="form-floating col-sm-10">
                        @if ($pelanggan->foto_ktp)
                        <img src="{{asset('storage/foto_ktp/'.$pelanggan->foto_ktp)}}" class="foto-ktp" alt="...">
                        @else
                        <span class="badge badge-danger">belum ada foto</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto KTP 2</label>
                    <div class="form-floating col-sm-10">
                        @if ($pelanggan->foto_ktp2)
                        <img src="{{asset('storage/foto_ktp2/'.$pelanggan->foto_ktp2)}}" class="foto-ktp" alt="...">
                        @else
                        <span class="badge badge-danger">belum ada foto</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>

@endsection