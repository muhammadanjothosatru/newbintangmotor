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
    <form action="{{ route('cabang.update', $cabang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Edit Data Cabang</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('cabang.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNIK"  class="col-sm-2 col-form-label font-form">Nama Cabang</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" value="{!! $cabang->nama !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Username" id="username">
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