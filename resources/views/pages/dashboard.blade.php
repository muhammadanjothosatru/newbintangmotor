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
      <canvas id="myChart" width="10px">Chart</canvas>
		</div>
</div>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection