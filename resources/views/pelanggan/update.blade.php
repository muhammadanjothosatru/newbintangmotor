@extends('template.master')
@section('link_css')
<link rel="stylesheet" href="{{ asset('css/pelanggan-create.css')}}">
@endsection
@section('konten')
<div class="card">
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    <div id="flasherror" data-flash="{{$error}}"></div>
    @endforeach
@endif

  @if(Session::has('success'))
  <div id="flash" data-flash="{{session('success')}}"></div>
  @endif
    <form id="form" action="{{ route('pelanggan.update',$pelanggan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="m-4">
        <div class="row pl-0 pr-0">
            <div class="font-form-header mb-3 col-6">Masukkan Data Pelanggan</div>
            <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-6">
                <div class="mb-3 row">
                    <label for="inputNIK"  class="col-sm-2 col-form-label font-form">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" name="nik" value="{!! $pelanggan->nik !!}" required="required" class="form-control form-control-size" placeholder="Masukkan NIK Pelanggan" id="nik" autofocus autocomplete="off">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama"  class="col-sm-2 col-form-label font-form">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" value="{!! $pelanggan->nama !!}" required="required" class="form-control form-control-size" placeholder="Masukkan Nama Pelanggan" id="nama" autocomplete="off">>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">Alamat</label>
                    <div class="form-floating col-sm-10">
                        <textarea style="overflow:hidden !important;"  class="form-control textarea-control-size" required="required" name="alamat" placeholder="Masukkan Alamat Pelanggan" id="alamat">{!! $pelanggan->alamat !!}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputNama" class="col-sm-2 col-form-label font-form">No. HP</label>
                        <div class="col-sm-10">
                            <input type="text" name="nomor_hp"  value="{!! $pelanggan->nomor_hp!!}" required="required" class="form-control form-control-size" placeholder="Masukkan No. HP Pelanggan" id="inputNIK" autocomplete="off">>
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto KTP</label>
                    <div class="form-floating col-sm-10">
                        @if ($pelanggan->foto_ktp)
                        <img src="{{asset('storage/foto_ktp/'.$pelanggan->foto_ktp)}}" class="img-thumbnail" style="width:50%"alt="...">
                        @else
                        <span class="badge badge-danger">belum ada foto</span>
                        @endif
                        <input class="form-control file-upload " accept="image/*" name="foto_ktp" type="file" id="file-upload"></input>
        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto KTP 2</label>
                    <div class="form-floating col-sm-10">
                        @if ($pelanggan->foto_ktp2)
                        <img src="{{asset('storage/foto_ktp2/'.$pelanggan->foto_ktp2)}}" class="img-thumbnail" style="width:50%"alt="...">
                        @else
                        <span class="badge badge-danger">belum ada foto</span>
                        @endif
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

<script type="text/javascript">
    
    function navigate(origin, sens) {
        var inputs = $('#form').find(':input:enabled:not(:button)');
        var index = inputs.index(origin);
        index += sens;

        if (index < 0) {
            index = inputs.length - 1;
        }
        if (index > inputs.length - 1) {
            index = 0;
        }
        inputs.eq(index).focus();
    }

    $('input').keydown(function(e) {
        if (e.keyCode==38) {
            navigate(e.target, -1);
        }
        if (e.keyCode==40) {
            navigate(e.target, 1);
        }
    });

    $('textarea').keydown(function(e) {
        if (e.keyCode==38) {
            navigate(e.target, -1);
        }
        if (e.keyCode==40) {
            navigate(e.target, 1);
        }
    });
   
</script>

@endsection