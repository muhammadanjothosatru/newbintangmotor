@extends('template.master')
@section('konten')


@if(Session::has('success'))
<div id="flash" data-flash="{{ Session('success') }}">

</div>
@endif

<div class="card">
    <div class="mt-3 ml-3">
      <h5 class="ml-1 pl-1 mb-0 pb-0">Dashboard</h5>
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
                  <div class="mt-1"><a href="kendaraan">Lihat semua kendaraan<i class="fas fa-arrow-right ml-2"></i></a></div>
                    
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
                  <div class="mt-1"><a href="transaksi">Lihat semua penjualan<i class="fas fa-arrow-right ml-2"></i></a></div>
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
                  <div class="mt-1"><a href="laporan">Lihat semua keuntungan<i class="fas fa-arrow-right ml-2"></i></a></div>
                </div>
              </div>
            </div>
		</div>
    <h6 class="ml-4 pl-1 mb-0 pb-0">Grafik Penjualan</h6>
		<div class="ml-4 mr-4 mt-0">
    
      <canvas id="myChart" height="400px"></canvas>
		</div>
</div>

<script>
var pembelian = {!! json_encode($pembelianperbulan) !!};
var bulan = {!! json_encode($bulanterakhir) !!};
var maxvalue = Math.max(...pembelian) + (10-(Math.max(...pembelian)%10));
if (maxvalue == Math.max(...pembelian)){
  maxvalue += 10;
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
            borderColor: '#1457ae',
            borderWidth: 0,
            borderRadius: 20,
            borderSkipped: 'bottom',
            barThickness: 15,
            maxBarThickness: 15,
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
            y: {
                beginAtZero: true,
                suggestedMin: 0,
                suggestedMax: maxvalue,
                ticks: {
                  stepSize: step
                }
            }
        }
    }
});
</script>
@endsection