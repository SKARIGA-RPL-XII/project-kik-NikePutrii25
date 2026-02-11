<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti_Pembayaran_Susu_BEAN_Feb2026</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        /* --- UI Browser Preview (Hanya muncul di layar) --- */
        .pdf-toolbar {
            position: fixed; top: 0; left: 0; right: 0;
            height: 55px; background: #323639;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 25px; color: white; z-index: 1000;
            font-family: 'Segoe UI', Tahoma, sans-serif;
        }
        .btn-tool {
            background: #4a4d51; border: none; color: white;
            padding: 8px 15px; border-radius: 4px; cursor: pointer;
            font-size: 13px; display: flex; align-items: center; gap: 8px;
            transition: 0.2s;
        }
        .btn-tool:hover { background: #5a5e63; }
        .btn-download { background: #1E3A8A; font-weight: bold; }
        .btn-download:hover { background: #172d6b; }

        body {
            background-color: #525659;
            margin: 0; padding-top: 80px; padding-bottom: 50px;
            display: flex; justify-content: center;
            font-family: 'Courier New', Courier, monospace; /* Font mesin ketik otentik */
        }

        /* --- Desain Kertas A4 --- */
        #element-to-download {
            background-color: white;
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
            box-sizing: border-box;
        }

        .header { text-align: center; margin-bottom: 30px; }
        .header h2 { margin: 0; letter-spacing: 2px; }
        .header p { margin: 5px 0; font-weight: bold; text-decoration: underline; }

        .info-table { width: 100%; margin-bottom: 25px; font-size: 14px; }
        .info-table td { padding: 4px 0; }

        /* Pembagian Tabel 2 Kolom */
        .table-container { display: flex; gap: 15px; margin-bottom: 30px; }
        .data-table { width: 50%; border-collapse: collapse; font-size: 11px; }
        .data-table th, .data-table td { border: 1px solid #000; padding: 5px; text-align: center; }
        
        .summary-box { float: right; width: 45%; margin-top: 20px; }
        .summary-box table { width: 100%; border-collapse: collapse; }
        .summary-box td { padding: 6px; font-weight: bold; font-size: 14px; }
        .text-right { text-align: right; }

        .footer-note { 
            margin-top: 100px; text-align: center; font-size: 11px; font-weight: bold;
            clear: both; border-top: 1px dashed #000; padding-top: 15px;
            text-transform: uppercase;
        }

        /* Pengaturan saat dicetak manual (Ctrl+P) */
        @media print {
            .no-print { display: none; }
            body { background: white; padding: 0; }
            #element-to-download { box-shadow: none; width: 100%; margin: 0; }
        }
    </style>
</head>
<body>

    <div class="pdf-toolbar no-print">
        <div style="display: flex; align-items: center; gap: 12px;">
            <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
            <span style="font-size: 14px; opacity: 0.9;">Laporan_Pembayaran_Susu_Feb_2026.pdf</span>
        </div>
        <div style="display: flex; gap: 10px;">
            <button class="btn-tool" onclick="window.print()">
                <i class="bi bi-printer"></i> Cetak
            </button>
            <button class="btn-tool btn-download" onclick="downloadPDF()">
                <i class="bi bi-download"></i> Download Langsung
            </button>
        </div>
    </div>

    <div id="element-to-download">
        <div class="header">
            <h2>PT. BERKAH MAHARDIKA WIJAYA</h2>
            <p>BUKTI PEMBAYARAN SUSU</p>
        </div>

        <table class="info-table">
            <tr>
                <td width="18%">PETERNAK</td>
                <td width="40%">: <b>BEAN</b></td>
                <td width="15%">PERIODE</td>
                <td>: <b>FEBRUARI 2026</b></td>
            </tr>
            <tr>
                <td>NO. ANGGOTA</td>
                <td>: <u>0021</u></td>
                <td>HARGA</td>
                <td>: <b>Rp 6.500/L</b></td>
            </tr>
        </table>

        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr style="background: #f0f0f0;">
                        <th>TANGGAL</th>
                        <th>WAKTU</th>
                        <th>TS (L)</th>
                        <th>AIR %</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td rowspan="2">16</td><td>PAGI</td><td>25</td><td>2.1</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.1</td></tr>
                    <tr><td rowspan="2">17</td><td>PAGI</td><td>23</td><td>2.2</td></tr>
                    <tr><td>SORE</td><td>14</td><td>2.0</td></tr>
                    <tr><td rowspan="2">18</td><td>PAGI</td><td>25</td><td>2.1</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.1</td></tr>
                    <tr><td rowspan="2">19</td><td>PAGI</td><td>25</td><td>2.2</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.1</td></tr>
                    <tr><td rowspan="2">20</td><td>PAGI</td><td>25</td><td>2.1</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.0</td></tr>
                </tbody>
                <tfoot>
                    <tr style="font-weight: bold; background: #f0f0f0;">
                        <td colspan="2">TOTAL</td>
                        <td>349 Liter</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

            <table class="data-table">
                <thead>
                    <tr style="background: #f0f0f0;">
                        <th>TANGGAL</th>
                        <th>WAKTU</th>
                        <th>TS (L)</th>
                        <th>AIR %</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td rowspan="2">25</td><td>PAGI</td><td>25</td><td>2.1</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.0</td></tr>
                    <tr><td rowspan="2">26</td><td>PAGI</td><td>25</td><td>2.1</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.1</td></tr>
                    <tr><td rowspan="2">27</td><td>PAGI</td><td>25</td><td>2.2</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.1</td></tr>
                    <tr><td rowspan="2">28</td><td>PAGI</td><td>25</td><td>2.1</td></tr>
                    <tr><td>SORE</td><td>16</td><td>2.0</td></tr>
                    <tr><td rowspan="2">29</td><td>PAGI</td><td>25</td><td>2.1</td></tr>
                    <tr><td>SORE</td><td>15</td><td>2.1</td></tr>
                </tbody>
                <tfoot>
                    <tr style="font-weight: bold; background: #f0f0f0;">
                        <td colspan="2">TOTAL</td>
                        <td>291 Liter</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="summary-box">
            <table>
                <tr>
                    <td>PEMBAYARAN</td>
                    <td class="text-right">Rp 22.425.000,00</td>
                </tr>
                <tr>
                    <td>POTONGAN SP</td>
                    <td class="text-right">Rp 500.000,00</td>
                </tr>
                <tr style="border-top: 2px solid #000;">
                    <td>TOTAL DITERIMA</td>
                    <td class="text-right" style="font-size: 18px;">Rp 21.925.000,00</td>
                </tr>
            </table>
        </div>

        <div class="footer-note">
            KADAR AIR MAKSIMAL 3% SELEBIHNYA DIBERLAKUKAN PINALTY
        </div>
    </div>

    <script>
        function downloadPDF() {
            const btn = document.querySelector('.btn-download');
            btn.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengunduh...';
            btn.disabled = true;

            const element = document.getElementById('element-to-download');
            const opt = {
                margin:       10,
                filename:     'Bukti_Pembayaran_BEAN_Feb2026.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            html2pdf().set(opt).from(element).save().then(() => {
                btn.innerHTML = '<i class="bi bi-download"></i> Download Langsung';
                btn.disabled = false;
            });
        }
    </script>
</body>
</html>