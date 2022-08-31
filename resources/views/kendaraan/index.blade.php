@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session('success') }}
</div> 
@endif

<a href="{{ route('kendaraan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Kendaraan</a>
<br><br>
<table id="example" class="display" style="width:100%">
    <thead>
		<tr>
			<th>NO</th>
			<th>NO.POL</th>
			<th>MERK</th>
			<th>NAMA PEMILIK</th>
			<th>TIPE</th>
			<th>WARNA</th>
			<th>TANGGAL MASUK</th>
			<th>HARGA BELI</th>
			<th>STATUS</th>
			<th>ACTION</th>
		</tr>
    </thead>
		@foreach($kendaraan as $k)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $k->no_pol }}</td>
			<td>{{ $k->merk}}</td>
			<td>{{ $k->nama_pemilik}}</td>
			<td>{{ $k->tipe}}</td>
			<td>{{ $k->warna}}</td>
			<td>{{ $k->tanggal_masuk}}</td>
			<td>{{ $k->harga_beli}}</td>
			<td><span class="badge bg-success">{{ $k->status_kendaraan}}</span></h1></td>
			<td>
                <a href="{{ route('kendaraan.edit', $k->no_pol ) }}" class="btn btn-primary btn-sm">Lihat</a>
            </td>
		</tr>
		@endforeach
	</table>
@endsection