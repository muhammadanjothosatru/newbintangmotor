@extends('template.master')
@section('konten')


@if(Session::has('success'))
<div id="flash" data-flash="{{ Session('success') }}">

</div>
@endif
<div class="card">
	<div class="m-4">
		<a href="{{route('cabang.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Tambah Cabang</a>
		<br><br>
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>No</th>
					<th>Cabang</th>
					<th>Action</th>
				</tr>
			</thead>
				@foreach($cabang as $data)
				<tr>
					<td style="width:5%">{{ $loop->iteration}}</td>
					<td>{{ $data->nama }}</td>
					<td style="width:10%">
						<form id="{{preg_replace('/\s+/', '', $data->id)}}" class="p-0" action="{{route('cabang.destroy',$data->id) }}" method="POST">
							@method('DELETE')
							@csrf	
						<a href="{{route('cabang.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
						<button class='btn btn-danger btn-sm'type="submit" value="{{$data->id}}" onclick="event.preventDefault(); dosomething(this.value)"><i class="far fa-trash-alt"></i></button>
						
					</form>
					</td>
				</tr>
				@endforeach
			</table>
	</div>
</div>
@endsection
