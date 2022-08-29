@extends('template.master')
@section('konten')
<a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Kendaraan</a>
<br><br>
<table id="example" class="display" style="width:100%">
    <thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>NOMOR HP</th>
			<th>ALAMAT</th>
			<th>ACTION</th>
		</tr>
    </thead>
		@foreach($pelanggan as $p)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $p->nama }}</td>
			<td>{{ $p->nomor_hp}}</td>
			<td>{{ $p->alamat}}</td>
			<td>
                <a href="#" class="btn btn-primary btn-sm">Lihat</a>
            </td>
		</tr>
		@endforeach
	</table>
 
 
@endsection