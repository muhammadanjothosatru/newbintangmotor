@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div id="flash" data-flash="{{session('success')}}"></div>
@endif

<div class="card">
    <div class="m-4">
    <div class="row">
            <div class="font-form-header col-6">
            <div class="dropdown ">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tipe Pembayaran
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="tipe-pembayaran dropdown-item" value="">Semua</button>
                    <button class="tipe-pembayaran dropdown-item" value="Tunai">Tunai</button>
                    <button class="tipe-pembayaran dropdown-item" value="Kredit">Kredit</button>
                </div>
                </div>
            </div>
            <div class="font-form-header col-6 d-flex justify-content-end">
                <button class="daterange btn btn-primary btn-sm mr-2" id="daterange"><i class="fas fa-filter mr-2"></i>Filter Periode</button>
            </div>
        </div>
        <br>
        <table id="laporan" class="display col-12"> 
        <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>No.Pol</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Warna</th>
                    <th>Pembayaran</th>
                    <th>Bank</th>
                    <th>Harga Beli</th>
                    <th>Komisi</th>
                    <th>Harga Jual</th>
                    <th>Laba</th>
                </tr>
        </thead>
        <tbody>
            @foreach($all_laporan_mobil as $data)
            <tr>
                <td style="width:25px">{{ $loop->iteration}}</td>
                <td style="width:100px">{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_pol }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->tipe}}</td>
                <td style="width:25px">{{ $data->tahun_pembuatan }}</td>
                <td style="width:50px">{{ $data->warna }}</td>
                <td style="width:50px">{{ $data->metode_pembayaran }}</td>
                <td>{{ $data->keterangan }}</td>
                <td>Rp. {{ number_format($data->harga_beli, 0, ',', '.');}}</td>
                <td>Rp. {{ number_format($data->komisi, 0, ',', '.');}}</td>
                <td>Rp. {{ number_format($data->harga_akhir, 0, ',', '.');}}</td>
                <td>Rp. {{ number_format($data->harga_akhir - ($data->harga_beli + $data->komisi), 0, ',', '.');}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th style="text-align:right; white-space: nowrap;">Total Laba:</th>
                <th style="text-align:right; white-space: nowrap"></th>
            </tr>
        </tfoot>
        </table>
        </div>
    </div>
@endsection
