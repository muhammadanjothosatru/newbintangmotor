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

        @foreach ($newitems as $data)
            <form id="form" action="{{ route('datamanagement.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="m-4">
                    <div class="row pl-0 pr-0">
                        <div class="font-form-header mb-3 col-6">Masukkan Detail Kendaraan</div>
                        <div class="font-form-header mb-3 col-6 d-flex justify-content-end">
                            <a href="{!! url()->previous() !!}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2"></i>Kembali</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3 row">
                                <label for="inputKendaraan" class="col-sm-2 col-form-label font-form">Kendaraan</label>
                                <div class="col-sm-10">
                                    <input name="kilometer" value="{{ $data->judul }}"
                                        class="form-control form-control-size" id="kendaraan" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputNama" class="col-sm-2 col-form-label font-form">Deskripsi</label>
                                <div class="form-floating col-sm-10">
                                    @foreach ($rowcount as $counter)
                                        <textarea class="form-control textarea-control-size" rows="{{ $counter->baris + 1 }}" required="required"
                                            style="height:100% !important; resize: none;"name="deskripsi" placeholder="Masukkan Deskripsi" id="deskripsi">{{ $data->deskripsi }}</textarea>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputKilometer" class="col-sm-2 col-form-label font-form">Kilometer</label>
                                <div class="col-sm-10">
                                    <input type="number" name="kilometer" value="{{ $data->kilometer }}"
                                        required="required" required="required" class="form-control form-control-size"
                                        placeholder="Masukkan Kilometer Kendaraan" id="kilometer">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputHarga" class="col-sm-2 col-form-label font-form">Harga Jual</label>
                                <div class="col-sm-10 col-form-label">
                                    <input type="text" name="harga_jual" value="Rp. {{ number_format($data->harga_jual, 0, ',', '.') }}"
                                        required="required" class="form-control form-control-size"
                                        placeholder="Masukkan Harga Jual Kendaraan" id="harga" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputHarga" class="col-sm-2 col-form-label font-form">DP</label>
                                <div class="col-sm-10 col-form-label">
                                    <input type="text" name="dp" value="{{ $data->dp }}"
                                        required="required" class="form-control form-control-size" id="dp">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputHarga" class="col-sm-2 col-form-label font-form">Angsuran</label>
                                <div class="col-sm-10 col-form-label">
                                    <input type="text" name="angsuran" value="Rp. {{ number_format($data->angsuran, 0, ',', '.') }}"
                                        required="required" class="form-control form-control-size" id="angsuran" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputHarga" class="col-sm-2 col-form-label font-form">Periode</label>
                                <div class="col-sm-10 col-form-label">
                                    <input type="text" name="bulan" value="{{ $data->bulan }}"
                                        required="required" class="form-control form-control-size" id="bulan">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="file-upload" class="col-sm-2 col-form-label font-form">Foto Kendaraan</label>
                                <div class="form-floating col-sm-10">
                                    <input class="form-control file-upload " accept="image/*" name="foto[]" type="file"
                                        id="file-upload" multiple></input>
                                </div>
                            </div>

                            <div class="row">
                                <button class="btn btn-primary btn-block"><i class="fas fa-save mr-2"></i>Simpan</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        @endforeach
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2();
        });

        function currency(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
        }

        var hargabeli = document.getElementById('harga');
        hargabeli.addEventListener('keyup', function(e) {
            hargabeli.value = currency(this.value, 'Rp')
        })

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

            if (index == 4) {
                $("#pilihmerk").select2('open');
            } else if (index == 6) {
                $("#jenis").select2('open');
            } else {
                inputs.eq(index).focus();
            }
        }

        $('input').keydown(function(e) {
            if (e.keyCode == 38) {
                navigate(e.target, -1);
            }
            if (e.keyCode == 40) {
                navigate(e.target, 1);
            }
        });

        $('textarea').keydown(function(e) {
            if (e.keyCode == 38) {
                navigate(e.target, -1);
            }
            if (e.keyCode == 40) {
                navigate(e.target, 1);
            }
        });

        function selectmetode(id) {
            $(document).ready(function() {
                if (id == 3) {
                    document.getElementById("tipe").focus();
                } else if (id == 5) {
                    document.getElementById("model").focus();
                }
            });
        };
    </script>

@endsection
