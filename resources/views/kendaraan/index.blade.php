@extends('template.master')
@section('konten')

@if(Session::has('success'))
<div id="flash" data-flash="{{session('success')}}"></div>
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
	@foreach($allkendaraan as $k)
	
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
		<td><span class="badge bg-success p-2">{{ $k->status_kendaraan}}</span></td>
		@elseif($k->status_kendaraan=='Terjual')
		<td><span class="badge bg-danger p-2">{{ $k->status_kendaraan}}</span></td>
		@endif
		
		<td>
			<form id="{{preg_replace('/\s+/', '', $k->no_pol)}}" class="p-0" action="{{route('kendaraan.destroy',$k->no_pol) }}" method="POST">
				@method('DELETE')
				@csrf	
				<a href="{{ route('kendaraan.edit', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
				<a href="{{ route('kendaraan.detail', $k->no_pol ) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
				@if($k->status_kendaraan == "Tersedia")
					<button class='delete btn btn-danger btn-sm' value="{{$k->no_pol}}" onclick="event.preventDefault(); dosomething(this.value)" type="submit"><i class="far fa-trash-alt"></i></button>
				@elseif($k->status_kendaraan == "Terjual")
					<button class='delete btn btn-danger btn-sm' value="{{$k->no_pol}}" onclick="event.preventDefault(); dosomething(this.value)" disabled type="submit"><i class="far fa-trash-alt"></i></button>
				@endif
			</form>
		</td>

	</tr>
	
		@endforeach
	
	</table>
	
@endsection



	