@extends('template.master')
@section('konten')
<form action="{{ route('pelanggan.index') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" class="form-control" name="judul" value="{{ old('judul') }}" required="required" Placeholder="Masukkan Judul Channel">
    </div>
    <div class="form-group">
        <label>Url - Channel</label>
        <input type="text" class="form-control" name="url_channel" required="required" Placeholder="Masukkan Link Url">
  
    </div>
    
    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" name="gambar" class="form-control" required="required" >
    </div>
  
    <div class="form-group">
        <button class="btn btn-primary btn-block">Simpan Channel</button>
    </div>
  
    </form>
    @endsection