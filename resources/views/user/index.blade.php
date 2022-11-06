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
<<<<<<< HEAD
					<form id="delete-kendaraan" class="p-0" action="{{route('user.destroy',$data->id) }}" method="POST">
						@method('DELETE')
						@csrf
						<a href="{{route('user.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
						<!-- <button class='btn btn-danger btn-sm'  type="submit" id="delete" ><i class="far fa-trash-alt"></i></button> -->
=======
						<form id="{{preg_replace('/\s+/', '', $data->id)}}" class="p-0" action="{{route('user.destroy',$data->id) }}" method="POST">
							@method('DELETE')
							@csrf
						<a href="{{route('user.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
						<button class='btn btn-danger btn-sm'type="submit" value="{{$data->id}}" onclick="event.preventDefault(); dosomething(this.value)"><i class="far fa-trash-alt"></i></button>
						
>>>>>>> 9f3e2ffc6e08740c8456ab7fa6fdc1e63c38c246
					</form>
					</td>
				</tr>
				@endforeach
			</table>
	</div>
</div>
@endsection