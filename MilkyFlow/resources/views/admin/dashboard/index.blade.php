@extends('admin.layout')

@section('page_title', 'Dashboard')

@section('content')

<h2 class="page-title">Selamat Datang, Admin! 👋🏻</h2>

<div class="stat-cards">

    <div class="stat-card">
        <div class="icon blue">
            <i class="fa-solid fa-users"></i>
        </div>
        <div>
            <h3>30 Orang</h3>
            <p>Total Peternak</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon green">
            <i class="fa-solid fa-droplet"></i>
        </div>
        <div>
            <h3>1.250 Liter</h3>
            <p>Setoran Hari Ini</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon orange">
            <i class="fa-solid fa-calendar-days"></i>
        </div>
        <div>
            <h3>32.480 Liter</h3>
            <p>Setoran Bulan Berjalan</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="icon red">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <div>
            <h3>24 Orang</h3>
            <p>Sudah Setor Hari Ini</p>
        </div>
    </div>

</div>

<div class="dashboard-grid">

    <div class="panel-susu">
        <h4>Rekap Setoran Susu Mingguan</h4>
        <canvas id="weeklyMilkChart" height="120"></canvas>
    </div>

    <div class="panel-ternak">
        <h4>Status Setoran Peternak</h4>
        <canvas id="statusSetoranChart" height="120"></canvas>
    </div>

</div>

@push('scripts')
<script>

const ctxLine = document.getElementById('weeklyMilkChart');

new Chart(ctxLine, {
    type: 'line',
    data: {
        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
        datasets: [{
            label: 'Liter Susu',
            data: [120, 150, 180, 140, 200, 170, 220],
            borderColor: '#1E3A8A',
            backgroundColor: 'rgba(30, 58, 138, 0.15)',
            tension: 0.4,
            fill: true,
            pointRadius: 4,
            pointBackgroundColor: '#1E3A8A'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#E5E7EB'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

const ctxDonut = document.getElementById('statusSetoranChart');

new Chart(ctxDonut, {
    type: 'doughnut',
    data: {
        labels: ['Sudah Setor', 'Terlambat', 'Belum Setor'],
        datasets: [{
            data: [24, 4, 2],
            backgroundColor: [
                '#12B76A',
                '#F79009',
                '#F04438'
            ],
            borderWidth: 0
        }]
    },
    options: {
        cutout: '70%',
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 12,
                    padding: 15
                }
            }
        }
    }
});
</script>
@endpush


@endsection
