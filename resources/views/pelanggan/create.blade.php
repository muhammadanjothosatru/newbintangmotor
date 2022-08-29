@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/pelanggan-create.css')}}">
@endsection
@section('konten')
<div class="card">
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Masukkan Detail Kendaraan</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-danger btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-save mr-2"></i>Simpan</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNIK" class="col-sm-2 col-form-label font-form">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-size" placeholder="Masukkan NIK Pelanggan" id="inputNIK">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-size" placeholder="Masukkan NIK Pelanggan" id="inputNIK">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control textarea-control-size" placeholder="Masukkan Alamat Pelanggan" id="floatingTextarea"></textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">No. HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-size" placeholder="Masukkan No. HP Pelanggan" id="inputNIK">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto KTP</label>
                    <div class="form-floating col-sm-10">
                        <input class="form-control file-upload " type="file" id="file-upload"></input>
                    </div>
                </div>
            </div>
            <div class="col-6">
                
            </div>
        </div>
    </div>
</div>

@endsection