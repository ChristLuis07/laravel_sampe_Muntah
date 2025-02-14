@extends('dashboard.layouts.app')

@section('title', 'Dashboard Analytics');

@section('content')
  <div class="container">
    <h1 class="mb-4">Dashboard Analytics</h1>

    <div class="row">
      <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
          <div class="card-body">
            <h5 class="card-title">Total Posts</h5>
            <p class="card-text">{{ $totalPosts }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
          <div class="card-body">
            <h5 class="card-title">Total Comments</h5>
            <p class="card-text">{{ $totalComments }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
          <div class="card-body">
            <h5 class="card-title">Total Reactions</h5>
            <p class="card-text">{{ $totalReactions }}</p>
          </div>
        </div>
      </div>
    </div>

    {{-- Statistik SEO --}}
    <div class="mb-4">
      <h4>SEO Optimization</h4>
      <p>Persentase postingan yang dioptimasi SEO (meta desctiption terisi): {{ $seoOptimizedPercentage }}</p>
    </div>

    {{-- Grafik Bulangan Postingan --}}
    <div class="mb-4">
      <h4>Postingan per Bulan</h4>
      <canvas id="postsChart" width="400" height="150"></canvas>
    </div>
  </div>
@endsection
@section('scripts')
  {{-- CDN --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Data Untuk Grafik
    const monthlyPosts = @json($monthlyPosts);
    const labels = monthlyPosts.map(item => 'Bulan' + item.month);
    const dataCounts = monthlyPosts.map(item => item.count);

    const ctx = document.getElementById('postsChart').getContext('2d');
    const postsChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Jumlah Postingan',
          data: dataCounts,
          backgroundcolor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1,
          fill: true,
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            precision: 0,
          }
        }
      }
    })
  </script>
@endsection
