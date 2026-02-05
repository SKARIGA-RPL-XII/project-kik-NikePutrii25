let zoomLevel = 1;

function openPreview() {
    const overlay = document.getElementById('modalOverlay');
    const modal = document.getElementById('modalPreview');

    if (!overlay || !modal) {
        console.warn('Modal preview / overlay tidak ditemukan');
        return;
    }

    overlay.classList.add('show');
    modal.classList.add('show');

    document.body.style.overflow = 'hidden';

    resetZoom();
}

function closePreview() {
    const overlay = document.getElementById('modalOverlay');
    const modal = document.getElementById('modalPreview');

    if (overlay) overlay.classList.remove('show');
    if (modal) modal.classList.remove('show');

    document.body.style.overflow = '';
}

function zoomIn() {
    zoomLevel += 0.1;
    applyZoom();
}

function zoomOut() {
    if (zoomLevel <= 0.4) return;
    zoomLevel -= 0.1;
    applyZoom();
}

function resetZoom() {
    zoomLevel = 1;
    applyZoom();
}

function applyZoom() {
    const paper = document.querySelector('.preview-paper');
    const zoomText = document.getElementById('zoomValue');

    if (!paper) return;

    paper.style.transform = `scale(${zoomLevel})`;
    paper.style.transformOrigin = 'top center';

    if (zoomText) {
        zoomText.innerText = Math.round(zoomLevel * 100) + '%';
    }
}

function downloadPDF() {
    const element = document.querySelector('.preview-paper');

    if (!element) {
        alert('Dokumen tidak ditemukan');
        return;
    }

    const opt = {
        margin: 10,
        filename: 'Laporan_Pembayaran_Susu.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: {
            scale: 2,
            useCORS: true
        },
        jsPDF: {
            unit: 'mm',
            format: 'a4',
            orientation: 'portrait'
        }
    };

    html2pdf().from(element).set(opt).save();
}

function printPDF() {
    const printContent = document.querySelector('.preview-paper');

    if (!printContent) return;

    const win = window.open('', '', 'width=900,height=650');

    win.document.write(`
        <html>
        <head>
            <title>Print Laporan Pembayaran</title>
            <style>
                body {
                    margin: 0;
                    padding: 20px;
                    font-family: Arial, sans-serif;
                }
                .preview-paper {
                    transform: scale(1) !important;
                }
            </style>
        </head>
        <body>
            ${printContent.outerHTML}
        </body>
        </html>
    `);

    win.document.close();
    win.focus();

    setTimeout(() => {
        win.print();
        win.close();
    }, 500);
}

document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('modalOverlay');

    if (overlay) {
        overlay.addEventListener('click', closePreview);
    }
});

function toggleFilter(id) {
    document.querySelectorAll('.filter-menu').forEach(menu => {
        if (menu.id !== id) menu.classList.remove('show');
    });

    const target = document.getElementById(id);
    if (target) target.classList.toggle('show');
}

function selectFilter(el, type) {
    const dropdown = el.closest('.filter-dropdown');
    const btn = dropdown.querySelector('.filter-btn');

    btn.innerHTML = el.textContent + ' <i class="fa-solid fa-chevron-down"></i>';

    dropdown.querySelector('.filter-menu').classList.remove('show');
}

document.addEventListener('click', function (e) {
    if (!e.target.closest('.filter-dropdown')) {
        document.querySelectorAll('.filter-menu').forEach(menu => {
            menu.classList.remove('show');
        });
    }
});

function openPreview() {
    document.getElementById('modalOverlay')?.classList.add('show');
    document.getElementById('modalPreview')?.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    document.getElementById(id)?.classList.remove('show');
    document.getElementById('modalOverlay')?.classList.remove('show');
    document.body.style.overflow = '';
}