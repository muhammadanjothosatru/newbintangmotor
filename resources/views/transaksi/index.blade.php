@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ Session('success') }} 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div> 
@endif

<div class="card">
    <div class="m-4">
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Transaksi Baru</a>
        <br><br>
        <table id="example" class="display col-12">
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
                    <th>Action</th>
                    
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
                @if ($data->keterangan=="Belum ACC")
                <td><span class="badge bg-warning">{{ $data->keterangan }}</span></td>
                @elseif ($data->keterangan=="Sudah ACC")
                <td><span class="badge bg-success">{{ $data->keterangan }}</span></td>
                @elseif($data->keterangan=="-")
                <td><span class="badge ">{{ $data->keterangan }}</span></td>
                @endif
                <td>
                    <a href="{{ route('transaksi.edit', $data->id ) }}" class="btn btn-primary btn-sm">Lihat</a>
                </td>
            </tr>
            @endforeach
        </tbody>
            </table>
            </div>
        </div>
@endsection
