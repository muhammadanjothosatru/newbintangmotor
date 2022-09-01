@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{ Session('success') }}
</div> 
@endif

<a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Pelanggan</a>
<br><br>
<table id="example" class="display" style="width:100%">
    <thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Nomor Hp</th>
			<th>Alamat</th>
			<th>Action</th>
		</tr>
    </thead>
		@foreach($pelanggan as $p)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $p->nama }}</td>
			<td>{{ $p->nomor_hp}}</td>
			<td>{{ $p->alamat}}</td>
			<td>
                <a href="{{ route('pelanggan.edit', $p->id ) }}" class="btn btn-primary btn-sm">Lihat</a>
            </td>
		</tr>
		@endforeach
	</table>
@endsection