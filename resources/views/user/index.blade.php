@extends('template.master')
@section('konten')


@if(Session::has('success'))
<div id="flash" data-flash="{{ Session('success') }}">

</div>
@endif
<div class="card">
	<div class="m-4">
		<a href="{{route('user.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah User</a>
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
					<td>{{ $data->cabang->nama }}</td>
					<td>
						<a href="{{route('user.edit',$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
					</td>
				</tr>
				@endforeach
			</table>
	</div>
</div>
@endsection