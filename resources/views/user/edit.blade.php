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
    <form action="{{ route('user.edit', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Detail User</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputUsername"  class="col-sm-2 col-form-label font-form">Username</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $user->username !!}">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputRole"  class="col-sm-2 col-form-label font-form">Role</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $user->role !!}">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-2 col-form-label font-form">Email</label>
                    <div class="form-floating col-sm-10">
                        <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $user->email !!}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputCabang" class="col-sm-2 col-form-label font-form">Cabang</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext font-data" id="staticEmail" value="{!! $user->cabang->nama !!}">
                        </div>
                </div>
            </div>
        </div>
   
    </div>
</form>
</div>

@endsection