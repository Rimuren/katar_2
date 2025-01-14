@extends('layouts.apperance')

@section('title', 'Dashboard')

@section('content')
    <!-- Header Dashboard -->
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1 id="artext">Welcome to Katar</h1>
        <p class="lead">The Best Smart Cashier Application in the Universe and the Entire Planet</p>
        <a href="#" class="btn btn-custom" style="color: #007bff;">Get Started <i class="fas fa-arrow-right"></i></a>
    </div>

    <!-- Statistik Ringkasan -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Penjualan</h5>
                    <p class="card-text">Rp {{ number_format($totalPenjualan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pelanggan</h5>
                    <p class="card-text">{{ $totalPelanggan }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Stok Barang</h5>
                    <p class="card-text">{{ $totalStok }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Penjualan -->
    <div class="mt-5">
        <h3 class="text-center">Grafik Penjualan Bulanan</h3>
        <canvas id="salesChart"></canvas>
    </div>

    <!-- Menyimpan Data untuk Chart di Data Attribute -->
    <div id="chartData" 
         data-bulan='@json($bulan)' 
         data-penjualan='@json($dataPenjualan)'>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mengambil data dari data attribute
    var chartElement = document.getElementById('chartData');
    var bulan = JSON.parse(chartElement.getAttribute('data-bulan'));
    var dataPenjualan = JSON.parse(chartElement.getAttribute('data-penjualan'));

    // Membuat Grafik dengan Chart.js
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: bulan,
            datasets: [{
                label: 'Penjualan',
                data: dataPenjualan,
                borderColor: '#007bff',
                borderWidth: 2
            }]
        }
    });
</script>
@endsection
