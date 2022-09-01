@extends('template.master')
@section('konten')
@auth
<h1>welcome, {{ Auth::user()->username  }}</h1>
@endauth

<a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Transaksi</a>
<br><br>
<table id="example" class="display" style="width:100%">
    <thead>
		<tr>
			<th>No</th>
			<th>username</th>
			<th>role</th>
			<th>email</th>
			<th>cabang</th>
			<th>Action</th>
		</tr>
    </thead>
		@foreach($user as $data)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{  $data->username }}</td>
			<td>{{$data->role}}</td>
			<td>{{$data->email}}</td>
			<td>{{ $data->cabang }}</td>
			<td>
                <a href="" class="btn btn-primary btn-sm">Lihat</a>
            </td>
		</tr>
		@endforeach
	</table>
@endsection