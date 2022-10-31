@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/pelanggan-create.css')}}">
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
    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Masukkan Data Pelanggan</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNIK"  class="col-sm-2 col-form-label font-form">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" value="{{ old('nik') }}" required="required" class="form-control form-control-size" placeholder="Masukkan NIK Pelanggan" id="nik">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama"  class="col-sm-2 col-form-label font-form">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" value="{{ old('nama') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nama Pelanggan" id="nama">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control textarea-control-size" required="required" name="alamat" placeholder="Masukkan Alamat Pelanggan" id="alamat">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">No. HP</label>
                        <div class="col-sm-10">
                            <input type="text" name="nomor_hp"  value="{{ old('nomor_hp') }}" required="required" class="form-control form-control-size" placeholder="Masukkan No. HP Pelanggan" id="inputNIK">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto KTP 1</label>
                    <div class="form-floating col-sm-10">
                        <input class="form-control file-upload " accept="image/*" name="foto_ktp" type="file" id="file-upload"></input>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto KTP 2</label>
                    <div class="form-floating col-sm-10">
                        <input class="form-control file-upload " accept="image/*" name="foto_ktp2" type="file" id="file-upload"></input>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button class="btn btn-primary btn-block"><i class="fas fa-save mr-2"></i>Simpan</button>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>

@endsection