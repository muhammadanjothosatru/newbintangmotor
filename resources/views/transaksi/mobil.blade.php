@extends('template.master')
@section('konten')

@if(Session::has('success'))
    <div id="flash" data-flash="{{session('success')}}"></div>
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
                    <th>Harga Jual</th>
                    <th>Bank</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
        <tbody>
            {{-- @if (Auth::user()->role == 1 && Auth::user()->cabang_id == 1) --}}
            @foreach($all_transaksi_mobil as $data)
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
                if ($data->metode_pembayaran=='Tunai')
                @if($data->lunas=="0")
                <td><span class="badge bg-success p-2">{{ $data->metode_pembayaran }}</span>  <span class="badge bg-warning p-2">Belum Lunas</span></td>
                @elseif($data->lunas=="1")
                <td><span class="badge bg-success p-2">{{ $data->metode_pembayaran }}</span></td>
                @endif
                @elseif($data->metode_pembayaran=='Kredit')
                <td><span class="badge bg-info p-2">{{ $data->metode_pembayaran }}</span></td>
                @endif
                <td>Rp. {{ number_format($data->harga_akhir, 0, ',', '.');}}</td>
                <td>
                <form target="_blank" class="p-0" action="{{route('transaksi.invoice', $data->id) }}" method="GET">
				    @method('PUT')
				    @csrf	
                    <a href="{{ route('transaksi.detail', $data->id ) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                    <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                </form>
                    
                </td>
            </tr>
            @endforeach
           
        </tbody>
            </table>
            </div>
        </div>

@if(Session::has('message'))
<form target="_blank" style="display: none" action="{{route('transaksi.invoice', session('message'))}}" method="GET" id="formsuccess">
    <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
</form>
<script type="text/javascript">
    var delayInMilliseconds = 2000; //1 second
    setTimeout(function() {
        $("#formsuccess").submit();
        setTimeout(function() {
            window.location.href = '/transaksi';
        }, delayInMilliseconds);
    }, delayInMilliseconds);
</script>
@endif
@endsection

