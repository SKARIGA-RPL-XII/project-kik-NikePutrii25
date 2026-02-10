document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('chartSetoran').getContext('2d');
    
    // Data dummy untuk simulasi 7 hari terakhir
    const labels = ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'];
    const dataSetoran = [12.5, 14.0, 15.5, 13.0, 14.8, 12.0, 15.5];

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Susu (Liter)',
                data: dataSetoran,
                borderColor: '#1E3A8A', // Navy Figma
                backgroundColor: 'rgba(30, 58, 138, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4, // Membuat garis melengkung halus
                pointBackgroundColor: '#1E3A8A',
                pointRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false // Sembunyikan label atas agar lebih bersih
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: '#f0f0f0'
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
});