@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session('success') }}
</div> 
@endif

<a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Transaksi</a>
<br><br>
<table id="example" class="display" style="width:100%">
    <thead>
		<tr>
			<th>No</th>
			<th>Tanggal Transaksi</th>
			<th>Nama Pelanggan</th>
			<th>No. Pol</th>
			<th>Merk</th>
			<th>Tipe</th>
			<th>Tahun</th>
			<th>Warna</th>
			<th>Metode Pembayaran</th>
			<th>Keterangan ACC</th>
			<th>Action</th>
		</tr>
    </thead>
		@foreach($transaksi as $data)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{  date("d M Y", strtotime($data->created_at)) }}</td>
			<td>{{$data->pelanggan->nama}}</td>
			<td>{{$data->kendaraan->no_pol}}</td>
			<td>{{ $data->kendaraan->merk }}</td>
			<td>{{ $data->kendaraan->tipe }}</td>
			<td>{{ $data->kendaraan->tahun }}</td>
			<td>{{ $data->kendaraan->warna }}</td>
			<td><span class="badge bg-warning">{{ $data->keterangan }}</span></td>
			<td><span class="badge bg-success"></span></h1></td>
			<td>
                <a href="" class="btn btn-primary btn-sm">Lihat</a>
            </td>
		</tr>
		@endforeach
	</table>
@endsection