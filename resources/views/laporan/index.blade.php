@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session('success') }}
</div> 
@endif

<div class="card">
    <div class="m-4">
    <div class="row">
            <div class="font-form-header col-6"></div>
            <div class="font-form-header col-6 d-flex justify-content-end">
                <button class="daterange btn btn-primary btn-sm mr-2"><i class="fas fa-filter mr-2"></i>Filter Periode</button>
                <div class="pdf font-form-header"></div> 
            </div>
        </div>
        <br>
        <table id="laporan" class="display col-12" id="order_table"> 
        <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pembelian</th>
                    <th>Nama Pelanggan</th>
                    <th>No.Pol</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Warna</th>
                    <th>Metode Pembayaran</th>
                    <th>Keterangan ACC</th>
                    
                </tr>
            </thead>
        <tbody>
            @foreach($transaksi as $data)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ $data->created_at->format('d M Y') }}</td>
                <td>{{ $data->pelanggan->nama }}</td>
                <td>{{ $data->kendaraan->no_pol }}</td>
                <td>{{ $data->kendaraan->merk }}</td>
                <td>{{ $data->kendaraan->tipe}}</td>
                <td>{{ $data->kendaraan->tahun_pembuatan }}</td>
                <td>{{ $data->kendaraan->warna }}</td>
                <td>{{ $data->metode_pembayaran }}</td>
                <td><span class="badge ">{{ $data->keterangan }}</span></td>
               
            </tr>
            @endforeach
            
           
        </tbody>
          
        
            </table>
            </div>
        </div>
@endsection
