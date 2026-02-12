document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();

            const target = this.dataset.target;
            const menu = document.getElementById(target);

            document.querySelectorAll('.filter-menu').forEach(m => {
                if (m !== menu) m.classList.remove('show');
            });

            menu.classList.toggle('show');
        });
    });

    document.querySelectorAll('.filter-menu li').forEach(item => {
        item.addEventListener('click', function () {
            const text = this.innerText;
            const menu = this.closest('.filter-menu');

            if (menu.id === 'filterWaktu') {
                document.getElementById('labelWaktu').innerText = text;
            }

            if (menu.id === 'filterBulan') {
                document.getElementById('labelBulan').innerText = text;
            }

            if (menu.id === 'filterTahun') {
                document.getElementById('labelTahun').innerText = text;
            }

            menu.classList.remove('show');
        });
    });

    document.addEventListener('click', function () {
        document.querySelectorAll('.filter-menu').forEach(m => {
            m.classList.remove('show');
        });
    });

});