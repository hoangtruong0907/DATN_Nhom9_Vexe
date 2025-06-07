@extends('admin.layouts.app')

@section('title', 'Trang Quản trị')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('contents')
<div class="p-6 grid grid-cols-1 sm:grid-cols-2 gap-6">

  <!-- Doanh thu vé -->
  <div class="panel bg-cyan-gradient">
    <div class="flex justify-between items-center mb-4">
      <span class="font-semibold text-lg">Doanh thu vé</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="5" cy="12" r="2" />
        <circle cx="12" cy="12" r="2" opacity="0.5" />
        <circle cx="19" cy="12" r="2" />
      </svg>
    </div>
    <div>
      <span class="data-value">₫1,250,000,000</span>
      <span class="change-badge positive">+5.20%</span>
    </div>
    <canvas id="doanhThuChart"></canvas>
    <div class="prev-week">
      <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path opacity="0.7" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3" /></svg>
      <span>Tuần trước: ₫1,190,000,000</span>
    </div>
  </div>

  <!-- Số lượng vé -->
  <div class="panel bg-violet-gradient">
    <div class="flex justify-between items-center mb-4">
      <span class="font-semibold text-lg">Số lượng vé</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="5" cy="12" r="2" />
        <circle cx="12" cy="12" r="2" opacity="0.5" />
        <circle cx="19" cy="12" r="2" />
      </svg>
    </div>
    <div>
      <span class="data-value">45,360</span>
      <span class="change-badge negative">-1.15%</span>
    </div>
    <canvas id="soLuongVeChart"></canvas>
    <div class="prev-week">
      <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path opacity="0.7" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3" /></svg>
      <span>Tuần trước: 45,880</span>
    </div>
  </div>

  <!-- Chi phí -->
  <div class="panel bg-blue-gradient">
    <div class="flex justify-between items-center mb-4">
      <span class="font-semibold text-lg">Chi phí</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="5" cy="12" r="2" />
        <circle cx="12" cy="12" r="2" opacity="0.5" />
        <circle cx="19" cy="12" r="2" />
      </svg>
    </div>
    <div>
      <span class="data-value">₫670,000,000</span>
      <span class="change-badge negative">-0.80%</span>
    </div>
    <canvas id="chiPhiChart"></canvas>
    <div class="prev-week">
      <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path opacity="0.7" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3" /></svg>
      <span>Tuần trước: ₫675,000,000</span>
    </div>
  </div>

  <!-- Lợi nhuận -->
  <div class="panel bg-pink-gradient">
    <div class="flex justify-between items-center mb-4">
      <span class="font-semibold text-lg">Lợi nhuận</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="5" cy="12" r="2" />
        <circle cx="12" cy="12" r="2" opacity="0.5" />
        <circle cx="19" cy="12" r="2" />
      </svg>
    </div>
    <div>
      <span class="data-value">₫580,000,000</span>
      <span class="change-badge positive">+2.00%</span>
    </div>
    <canvas id="loiNhuanChart"></canvas>
    <div class="prev-week">
      <svg class="eye-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path opacity="0.7" d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/><circle cx="12" cy="12" r="3" /></svg>
      <span>Tuần trước: ₫570,000,000</span>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    new Chart(document.getElementById('doanhThuChart').getContext('2d'), {
      type: 'line',
      data: {
        labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
        datasets: [{
          data: [1200000000, 1250000000, 1230000000, 1280000000, 1300000000, 1270000000, 1250000000],
          borderColor: 'rgba(255,255,255,0.9)',
          backgroundColor: 'rgba(255,255,255,0.35)',
          fill: true,
          tension: 0.35,
          pointRadius: 4,
          pointHoverRadius: 7,
          borderWidth: 3,
          pointBackgroundColor: 'white'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: {
            ticks: { color: 'rgba(255,255,255,0.95)', font: {size: 14, weight: '600'} },
            grid: { display: false }
          },
          y: { display: false }
        }
      }
    });

    new Chart(document.getElementById('soLuongVeChart').getContext('2d'), {
      type: 'bar',
      data: {
        labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
        datasets: [{
          data: [46000, 45300, 45500, 45000, 44800, 45200, 45360],
          backgroundColor: 'rgba(255,255,255,0.7)',
          borderRadius: 8,
          barPercentage: 0.6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: {
            ticks: { color: 'rgba(255,255,255,0.95)', font: {size: 14, weight: '600'} },
            grid: { display: false }
          },
          y: { display: false }
        }
      }
    });

    new Chart(document.getElementById('chiPhiChart').getContext('2d'), {
      type: 'line',
      data: {
        labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
        datasets: [{
          data: [680000000, 675000000, 672000000, 670000000, 668000000, 669000000, 670000000],
          borderColor: 'rgba(255,255,255,0.9)',
          backgroundColor: 'rgba(255,255,255,0.25)',
          fill: true,
          tension: 0.35,
          pointRadius: 3,
          borderWidth: 2,
          pointBackgroundColor: 'white'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: {
            ticks: { color: 'rgba(255,255,255,0.95)', font: {size: 14, weight: '600'} },
            grid: { display: false }
          },
          y: { display: false }
        }
      }
    });

    new Chart(document.getElementById('loiNhuanChart').getContext('2d'), {
      type: 'bar',
      data: {
        labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
        datasets: [{
          data: [570000000, 575000000, 580000000, 585000000, 590000000, 585000000, 580000000],
          backgroundColor: 'rgba(255,255,255,0.8)',
          borderRadius: 8,
          barPercentage: 0.6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: {
            ticks: { color: 'rgba(255,255,255,0.95)', font: {size: 14, weight: '600'} },
            grid: { display: false }
          },
          y: { display: false }
        }
      }
    });
  });
</script>
@endsection
