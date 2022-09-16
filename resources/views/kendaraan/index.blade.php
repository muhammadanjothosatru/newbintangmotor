@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{ Session('success') }} 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
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
	@foreach($adminlamongan as $k)
		@if (Auth::user()->role == 1 && Auth::user()->cabang_id == 1)
	<tr>
		
		
		<td>{{ $loop->iteration}}</td>
		<td>{{ $k->no_pol }}</td>
		<td>{{ $k->merk}}</td>
		<td>{{ $k->nama_pemilik}}</td>
		<td>{{ $k->tipe}}</td>
		<td>{{ $k->warna}}</td>
		<td>{{  \Carbon\Carbon::parse($k->tanggal_masuk)->format('d M Y')}}</td>
		<td>Rp. {{ number_format($k->harga_beli, 0, ',', '.');}}</td>
		@if ($k->status_kendaraan=='Tersedia')
		<td><span class="badge bg-success">{{ $k->status_kendaraan}}</span></td>
		@elseif($k->status_kendaraan=='Terjual')
		<td><span class="badge bg-danger">{{ $k->status_kendaraan}}</span></td>
		@endif
		
		<td>
			<form class="p-0" action="{{route('kendaraan.destroy',$k->no_pol) }}" method="POST">
				@method('DELETE')
				@csrf	
				<a href="{{ route('kendaraan.edit', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
				<a href="{{ route('kendaraan.detail', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
				@if($k->status_kendaraan == "Tersedia")
				<button class='btn btn-danger btn-sm' type="submit" onclick="return confirm('Are you sure?')"data-toggle="confirmation" ><i class="far fa-trash-alt"></i></button>
				@elseif($k->status_kendaraan == "Terjual")
				<button class='btn btn-danger btn-sm' disabled type="submit" onclick="return confirm('Are you sure?')"data-toggle="confirmation" ><i class="far fa-trash-alt"></i></button>
				@endif
			</form>
		</td>

	</tr>
	@endif
		@endforeach
		@if (Auth::user()->role == 1 && Auth::user()->cabang_id == 2)
		@foreach($adminbabat as $k)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $k->no_pol }}</td>
			<td>{{ $k->merk}}</td>
			<td>{{ $k->nama_pemilik}}</td>
			<td>{{ $k->tipe}}</td>
			<td>{{ $k->warna}}</td>
			<td>{{ \Carbon\Carbon::parse($k->tanggal_masuk)->format('d M Y')}}</td>
			<td>Rp. {{ number_format($k->harga_beli, 0, ',', '.');}}</td>
			@if ($k->status_kendaraan=='Tersedia')
			<td><span class="badge bg-success">{{ $k->status_kendaraan}}</span></td>
			@elseif($k->status_kendaraan=='Terjual')
			<td><span class="badge bg-danger">{{ $k->status_kendaraan}}</span></td>
			@endif
			
			<td>
				<form class="p-0" action="{{route('kendaraan.destroy',$k->no_pol) }}" method="POST">
					@method('DELETE')
					@csrf
					<a href="{{ route('kendaraan.edit', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>	
					<a href="{{ route('kendaraan.detail', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
					@if($k->status_kendaraan == "Tersedia")
					<button class='btn btn-danger btn-sm' type="submit" onclick="return confirm('Are you sure?')"data-toggle="confirmation" ><i class="far fa-trash-alt"></i></button>
					@elseif($k->status_kendaraan == "Terjual")
					<button class='btn btn-danger btn-sm' disabled type="submit" onclick="return confirm('Are you sure?')"data-toggle="confirmation" ><i class="far fa-trash-alt"></i></button>
					@endif
				</form>
			</td>
		</tr>
		@endforeach
		@endif
		
		@if (Auth::user()->role == 0)
		@foreach($kendaraan as $k)
		<tr>
			<td>{{ $loop->iteration}}</td>
			<td>{{ $k->no_pol }}</td>
			<td>{{ $k->merk}}</td>
			<td>{{ $k->nama_pemilik}}</td>
			<td>{{ $k->tipe}}</td>
			<td>{{ $k->warna}}</td>
			<td>{{ $k->tanggal_masuk->format('d M Y')}}</td>
			<td>Rp. {{ number_format($k->harga_beli, 0, ',', '.');}}</td>
			@if ($k->status_kendaraan=='Tersedia')
			<td><span class="badge bg-success">{{ $k->status_kendaraan}}</span></td>
			@elseif($k->status_kendaraan=='Terjual')
			<td><span class="badge bg-danger">{{ $k->status_kendaraan}}</span></td>
			@endif
			
			<td>
				<form class="p-0" action="{{route('kendaraan.destroy',$k->no_pol) }}" method="POST">
					@method('DELETE')
					@csrf
					<a href="{{ route('kendaraan.edit', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>	
					<a href="{{ route('kendaraan.detail', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
					@if($k->status_kendaraan == "Tersedia")
					<button class='btn btn-danger btn-sm' type="submit" onclick="return confirm('Are you sure?')"data-toggle="confirmation" ><i class="far fa-trash-alt"></i></button>
					@elseif($k->status_kendaraan == "Terjual")
					<button class='btn btn-danger btn-sm' disabled type="submit" onclick="return confirm('Are you sure?')"data-toggle="confirmation" ><i class="far fa-trash-alt"></i></button>
					@endif
				</form>
			</td>
		</tr>
		@endforeach
		@endif
	</table>
	
@endsection
