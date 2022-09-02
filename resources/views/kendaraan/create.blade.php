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
    <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Masukkan Detail Kendaraan</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNoPol"  class="col-sm-2 col-form-label font-form">No. Pol.</label>
                        <div class="col-sm-10">
                            <input type="text" name="nopol" value="{{ old('nik') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nomor Polisi" id="nopol">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNamaPemilik"  class="col-sm-2 col-form-label font-form">Nama Pemilik</label>
                        <div class="col-sm-10">
                            <input type="text" name="namapemilik" value="{{ old('nama') }}" required="required" class="form-control form-control-size" placeholder="Masukkan Nama Pemilik" id="namapemilik">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                    <div class="form-floating col-sm-10">
                        <textarea class="form-control textarea-control-size" required="required" name="alamat" placeholder="Masukkan Alamat Pemilik" id="alamat">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputMerk" class="col-sm-2 col-form-label font-form">Merk</label>
                        <div class="col-sm-10">
                            <div class="dropdown ">
                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                    Pilih Merk
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Honda</a></li>
                                    <li><a class="dropdown-item" href="#">Yamaha</a></li>
                                    <li><a class="dropdown-item" href="#">Suzuki</a></li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>

@endsection