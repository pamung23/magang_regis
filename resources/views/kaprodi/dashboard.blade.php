@extends('kaprodi.layouts.app')

@section('title', 'Dashboard')

@push('styles')
<link href="{{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
@foreach ($dataProdi as $prodi)
<div class="col-lg-4 layout-spacing">
  <div class="widget-two">
    <div class="widget-content">
      <div class="w-numeric-value justify-content-start">
        <div class="w-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="w-content ml-3">
          <span class="w-value">{{ $prodi->mahasiswa->count() }}</span>
          <span class="w-numeric-title">Mahasiswa - {{ $prodi->nama_prodi }}</span>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-lg-4 layout-spacing">
  <div class="widget-two">
    <div class="widget-content">
      <div class="w-numeric-value justify-content-start">
        <div class="w-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="w-content ml-3">
          <span class="w-value">{{ $mahasiswaSuratCounts }}</span>
          <span class="w-numeric-title">Mahasiswa yang Mendaftar</span>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-lg-4 layout-spacing">
  <div class="widget-two">
    <div class="widget-content">
      <div class="w-numeric-value justify-content-start">
        <div class="w-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="w-content ml-3">
          <span class="w-value">{{ $mahasiswaBelumMendaftarCounts }}</span>
          <span class="w-numeric-title">Mahasiswa yang belum mendaftar surat magang</span>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-lg-6 layout-spacing">
  <div class="widget-two">
    <div class="widget-content">
      <div class="w-numeric-value justify-content-start">
        <div class="w-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="w-content ml-3">
          <span class="w-value">{{ $suratDisetujuiCounts }}</span>
          <span class="w-numeric-title">Surat yang sudah disetujui</span>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-lg-6 layout-spacing">
  <div class="widget-two">
    <div class="widget-content">
      <div class="w-numeric-value justify-content-start">
        <div class="w-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </div>
        <div class="w-content ml-3">
          <span class="w-value">{{ $suratBelumDisetujuiCounts }}</span>
          <span class="w-numeric-title">Surat yang belum disetujui</span>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-xl-6 layout-spacing">
  <div class="statbox widget box box-shadow">
    <div class="widget-header">
      <div class="row">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
          <h4>Surat Chart</h4>
        </div>
        <div class="col-12">
          <div class="chart-container">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
        var suratChart = document.getElementById('myChart').getContext('2d');

        var data = {
            labels: ['Surat Disetujui', 'Surat Belum Disetujui'],
            datasets: [{
                data: [
                    {{ $suratDisetujuiCounts }},
                    {{ $suratBelumDisetujuiCounts }}
                ],
                backgroundColor: ['#36A2EB', '#FF6384'],
                borderWidth: 0
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                position: 'bottom',
                labels: {
                    fontColor: '#666'
                }
            }
        };

        new Chart(suratChart, {
            type: 'pie', // Tipe chart diganti menjadi 'pie'
            data: data,
            options: options
        });
    });
</script>

@endpush