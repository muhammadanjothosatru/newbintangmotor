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
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Masukkan Data User</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
                <a href="{{ route('user.ubahPassword',$user->id) }}" class="btn btn-primary btn-sm ml-2"><i class="fas fa-pen mr-2"></i>Ubah Password</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNIK"  class="col-sm-2 col-form-label font-form">Username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" value="{!! $user->username !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Username" id="username">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama"  class="col-sm-2 col-form-label font-form">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" value="{!! $user->email!!}" required="required" class="form-control form-control-size" placeholder="Masukkan Email" id="email">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Role</label>
                    <div class="dropdown col-sm-10 mt-1">
                        <select class="select2 selectform" name="role" data-placeholder="Pilih Role" style="width: 100%" data-minimum-results-for-search="Infinity">
                            <option></option>
                            <option value="0" {{ $user->role == "0" ? 'selected' : '' }}>0 - Super Admin</option>
                            <option value="1" {{ $user->role == "1" ? 'selected' : '' }}>1 - Sepeda Motor</option>
                            <option value="2" {{ $user->role == "2" ? 'selected' : '' }}>2 - Mobil</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputCabang"  class="mt-2 col-sm-2 col-form-label font-form">Cabang.</label>
                    <div class="col-sm-10">
                        <select class="select2 col-sm-12" name="cabang_id" data-placeholder="Cari Cabang">
                            <option></option>
                                @foreach($cabangall as $data)
                                    <option  value="{{ $data->id }}"{{ $data->id == $cabang->id ? 'selected' : '' }}>{{$data->nama}}</option>
                                @endforeach
                            </select>
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