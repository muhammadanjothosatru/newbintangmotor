@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session('success') }}
</div> 
@endif

<div class="card ">
	<div class="m-4">
	<a href="{{ route('kendaraan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Kendaraan</a>
<br><br>
<table id="example" class="display col-12">
    <thead>
		<tr>
			<th>No</th>
			<th>No. Pol</th>
			<th>Merk</th>
			<th>Nama Pemilik</th>
			<th>Tipe</th>
			<th>Warna</th>
			<th>Tanggal Masuk</th>
			<th>Harga Beli</th>
			<th>Status</th>
			<th>Action</th>
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
			@if ($k->status_kendaraan=='Tersedia')
			<td><span class="badge bg-success">{{ $k->status_kendaraan}}</span></td>
			@elseif($k->status_kendaraan=='Terjual')
			<td><span class="badge bg-danger">{{ $k->status_kendaraan}}</span></td>
			@endif
			
			<td>
                <a href="{{ route('kendaraan.edit', $k->no_pol ) }}" class="btn btn-primary btn-sm">Lihat</a>
            </td>
		</tr>
		@endforeach
	</table>
	</div>
</div>
@endsection