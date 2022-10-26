@extends('template.master')
@section('konten')


@if(Session::has('success'))
<div id="flash" data-flash="{{ Session('success') }}">

</div>
@endif

<h5>Dashboard</h5>

<div class="card">
		<!-- @auth
		<h5>welcome, {{ Auth::user()->username  }}</h5>
		@endauth -->
		<div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 ">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-motorcycle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Kendaraan</h4>
                  </div>
                  <div class="card-body">
				  	@foreach($allkendaraan as $total)
						{{$total->total_kendaraan}}
					@endforeach	
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Penjualan Bulan Ini</h4>
                  </div>
                  <div class="card-body">
                    59
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Keuntungan Bulan Ini</h4>
                  </div>
                  <div class="card-body">
                    RP. 128.000.000,00
                  </div>
                </div>
              </div>
            </div>
		</div>
		<div>
		
		</div>
</div>
@endsection