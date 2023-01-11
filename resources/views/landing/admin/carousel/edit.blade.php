@extends('landing.admin.template.master')

@section('link_css')
    <link rel="stylesheet" href="{{ asset('css/kendaraan-create.css') }}">
@endsection
@section('konten')
    <div class="card">
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div id="flasherror" data-flash=" {{ $error }}"></div>
            @endforeach
        @endif

        @if (Session::has('success'))
            <div id="flash" data-flash="{{ session('success') }}"></div>
        @endif

        <form id="form" action="{{ route('carousel.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="m-4">
                <div class="row pl-0 pr-0">
                    <div class="font-form-header mb-3 col-6">Masukkan Detail Promo</div>
                    <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                        <a href="{!! url()->previous() !!}" class="btn btn-primary btn-sm"><i
                                class="fas fa-arrow-left mr-2"></i>Kembali</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3 row">
                            <label for="namapromo" class="col-sm-2 col-form-label font-form">Nama Promo</label>
                            <div class="col-sm-10 col-form-label">
                                <input type="text" name="namapromo" value="{{ $promo->namapromo }}" required="required"
                                    class="form-control form-control-size" placeholder="Masukkan Nama Promo" id="namapromo">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="linkpromo" class="col-sm-2 col-form-label font-form">Link Promo</label>
                            <div class="col-sm-10 col-form-label">
                                <input type="text" name="linkpromo" value="{{ $promo->linkpromo }}" required="required"
                                    class="form-control form-control-size" placeholder="Masukkan Link Promo" id="linkpromo">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto Promo</label>
                            <div class="form-floating col-sm-10">
                                <input class="form-control file-upload " accept="image/*" name="foto" type="file"
                                    id="file-upload"></input>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-primary btn-block"><i class="fas fa-save mr-2"></i>Simpan</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
