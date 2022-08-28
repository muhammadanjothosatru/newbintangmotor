@extends('template.master')
@section('konten')
 
<table id="example" class="display" style="width:100%">
    <thead>
		<tr>
			<th>NO</th>
			<th>ID</th>
			<th>USERNAME</th>
			<th>ROLE</th>
			<th>EMAIL</th>
			<th>CABANG</th>
		</tr>
    </thead>
		@foreach($user as $p)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $p->id }}</td>
			<td>{{ $p->username }}</td>
			<td>{{ $p->role }}</td>
			<td>{{ $p->email }}</td>
			<td>{{ $p->cabang }}</td>
		</tr>
		@endforeach
	</table>
 
 
@endsection