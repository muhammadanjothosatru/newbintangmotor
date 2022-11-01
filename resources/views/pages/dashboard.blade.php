@extends('template.master')
@section('konten')


@if(Session::has('success'))
<div id="flash" data-flash="{{ Session('success') }}">

</div>
@endif

<div class="card">
		<!-- @auth
		<h5>welcome, {{ Auth::user()->username  }}</h5>
		@endauth -->
    <div class="mt-3 ml-3">
      <h5>Dashboard</h5>
    </div>
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
                    @foreach($all_transaksi as $total)
                      {{$total->total_transaksi}}
                    @endforeach
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
                    @foreach($all_keuntungan as $total)
                      Rp. {{ number_format($total->total_keuntungan, 0, ',', '.');}}
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
		</div>
		<div>
      <canvas id="myChart" height="400px"></canvas>
		</div>
</div>

<script>
var pembelian = {!! json_encode($pembelianperbulan) !!};
var bulan = {!! json_encode($bulanterakhir) !!};
var maxvalue = Math.max(...pembelian)+10;
if(maxvalue%2!=0){
  maxvalue += 1;
}else{
  maxvalue += 0;
}
var step = maxvalue/10;
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: bulan,
        datasets: [{
            label: 'Penjualan Per Bulan',
            data: pembelian,
            backgroundColor: [
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)',
                'rgba(20, 87, 174, 1)'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
              display: true,
              ticks: {
                beginAtZero: true,
                stepSize: step,
                max: maxvalue
            }
            }],
            xAxes: [{
                barThickness: 20,
                maxBarThickness: 20 
            }]
        },
        plugins: {
            title: {
                display: true,
                text: 'Penjualan'
            }
        }
    }
});
</script>
@endsection