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

<div class="card">
    <div class="m-4">
        @if(Auth::user()->role != 0)
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus mr-2"></i>Transaksi Baru</a>
        @endif
        <br><br>
        <table id="example" class="display col-12">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pembelian</th>
                    <th>Nama Pelanggan</th>
                    <th>No.Pol</th>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Warna</th>
                    <th>Metode Pembayaran</th>
                    <th>Keterangan ACC</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
        <tbody>
            @if (Auth::user()->role == 1 && Auth::user()->cabang_id == 1)
            @foreach($transaksi_lamongan_motor as $data)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_pol }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->tipe}}</td>
                <td>{{ $data->tahun_pembuatan }}</td>
                <td>{{ $data->warna }}</td>
                <td>{{ $data->metode_pembayaran }}</td>
                @if ($data->keterangan=="Belum ACC")
                <td><span class="badge bg-warning">{{ $data->keterangan }}</span></td>
                @elseif ($data->keterangan=="Sudah ACC")
                <td><span class="badge bg-success">{{ $data->keterangan }}</span></td>
                @elseif($data->keterangan=="-")
                <td><span class="badge ">{{ $data->keterangan }}</span></td>
                @endif
                <td>
                    <a href="{{ route('transaksi.edit', $data->id ) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
            @endif

            @if (Auth::user()->role == 1 && Auth::user()->cabang_id == 2)
            @foreach($transaksi_babat_motor as $data)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_pol }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->tipe}}</td>
                <td>{{ $data->tahun_pembuatan }}</td>
                <td>{{ $data->warna }}</td>
                <td>{{ $data->metode_pembayaran }}</td>
                @if ($data->keterangan=="Belum ACC")
                <td><span class="badge bg-warning">{{ $data->keterangan }}</span></td>
                @elseif ($data->keterangan=="Sudah ACC")
                <td><span class="badge bg-success">{{ $data->keterangan }}</span></td>
                @elseif($data->keterangan=="-")
                <td><span class="badge ">{{ $data->keterangan }}</span></td>
                @endif
                <td>
                    <a href="{{ route('transaksi.edit', $data->id ) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
            @endif

            @if (Auth::user()->role == 0 )
            @foreach($transaksi_motor as $data)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y')}}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->no_pol }}</td>
                <td>{{ $data->merk }}</td>
                <td>{{ $data->tipe}}</td>
                <td>{{ $data->tahun_pembuatan }}</td>
                <td>{{ $data->warna }}</td>
                <td>{{ $data->metode_pembayaran }}</td>
                @if ($data->keterangan=="Belum ACC")
                <td><span class="badge bg-warning">{{ $data->keterangan }}</span></td>
                @elseif ($data->keterangan=="Sudah ACC")
                <td><span class="badge bg-success">{{ $data->keterangan }}</span></td>
                @elseif($data->keterangan=="-")
                <td><span class="badge ">{{ $data->keterangan }}</span></td>
                @endif
                <td>
                    <a href="{{ route('transaksi.edit', $data->id ) }}" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
            </table>
            </div>
        </div>
@endsection
