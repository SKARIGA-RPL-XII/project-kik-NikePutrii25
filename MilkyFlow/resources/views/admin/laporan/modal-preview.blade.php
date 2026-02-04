<div class="modal-overlay" id="modalOverlay" onclick="closePreview()"></div>

<div class="modal modal-preview" id="modalPreview">
    <div class="modal-box preview-box">

        <div class="preview-header">
            <h3>Preview Laporan Pembayaran</h3>
            <button class="modal-close" onclick="closePreview()">&times;</button>
        </div>

        <div class="preview-toolbar">
            <button type="button" onclick="zoomOut()">
                <i class="fa-solid fa-minus"></i>
            </button>

            <span id="zoomValue">100%</span>

            <button type="button" onclick="zoomIn()">
                <i class="fa-solid fa-plus"></i>
            </button>

            <div class="toolbar-right">
                <button type="button" onclick="printPDF()">
                    <i class="fa-solid fa-print"></i>
                </button>
                <button type="button" onclick="downloadPDF()">
                    <i class="fa-solid fa-download"></i>
                </button>
            </div>
        </div>

        <!-- BODY -->
        <div class="preview-body">
            <div class="preview-paper">

                <h4 class="center">PT. BERKAH MAHARDIKA WIJAYA</h4>
                <p class="center bold">BUKTI PEMBAYARAN SUSU</p>

                <table class="info-table">
                    <tr>
                        <td>Peternak</td>
                        <td>: Suyanto</td>
                    </tr>
                    <tr>
                        <td>Periode</td>
                        <td>: Januari 2025</td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>: Rp 6.500 / Liter</td>
                    </tr>
                </table>

                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Liter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>16</td>
                            <td>Pagi</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Sore</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Pagi</td>
                            <td>23</td>
                        </tr>
                    </tbody>
                </table>

                <table class="summary-table">
                    <tr>
                        <td>Total Liter</td>
                        <td>3.450 L</td>
                    </tr>
                    <tr>
                        <td>Total Nilai</td>
                        <td>Rp 22.425.000</td>
                    </tr>
                    <tr>
                        <td>Potongan</td>
                        <td>Rp 500.000</td>
                    </tr>
                    <tr class="bold">
                        <td>Total Diterima</td>
                        <td>Rp 21.925.000</td>
                    </tr>
                </table>

                <p class="note">
                    Kadar air maksimal 3%, selebihnya diberlakukan penalty.
                </p>

            </div>
        </div>

    </div>
</div>