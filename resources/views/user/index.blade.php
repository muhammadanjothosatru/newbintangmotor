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
					
					@if($data->role == '1')
						<td><span class="badge bg-info p-2">Admin Motor</span></td>
					@elseif($data->role == '2')
					<td><span class="badge bg-secondary p-2">Admin Mobil</span></td>
					@elseif($data->role == '0')
					<td><span class="badge bg-danger p-2">Super Admin</span></td>
					@endif
					<td>{{$data->email}}</td>
					<td>{{ $data->cabang->nama }}</td>
					<td>
						<form id="{{preg_replace('/\s+/', '', $data->id)}}" class="p-0" action="{{route('user.destroy',$data->id) }}" method="POST">
							@method('DELETE')
							@csrf
						<a href="{{route('user.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
						@if($data->username != 'superadmin')
							<button class='btn btn-danger btn-sm'type="submit" value="{{$data->id}}" onclick="event.preventDefault(); dosomething(this.value)"><i class="far fa-trash-alt"></i></button>
						@endif

						
					</form>
					</td>
				</tr>
				@endforeach
			</table>
	</div>
</div>
@endsection