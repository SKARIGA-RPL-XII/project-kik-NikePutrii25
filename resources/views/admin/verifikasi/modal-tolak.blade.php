<div class="modal-overlay" id="modalTolakOverlay"></div>

<div class="modal" id="modalTolak">
    <div class="modal-box">
        <div class="modal-header-container">
            <h3>Verifikasi Setoran</h3>
            <div class="modal-divider"></div>
        </div>

        <form method="POST" id="formTolak">
            @csrf
            @method('PUT')

            <input type="hidden" name="status_setor" value="ditolak">

            <div class="detail-grid">
                <div class="detail-item">
                    <label>Peternak</label>
                    <span id="tolak_nama">—</span>
                </div>

                <div class="detail-item">
                    <label>Tanggal</label>
                    <span id="tolak_tanggal">—</span>
                </div>

                <div class="detail-item">
                    <label>Jumlah (Liter)</label>
                    <span class="value-highlight">
                        <span id="tolak_jumlah">0</span>
                    </span>
                </div>

                <div class="detail-item">
                    <label>Kadar Air</label>
                    <span class="value-highlight">
                        <span id="tolak_kadar">0</span>
                    </span>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group">
                    <label>
                        Alasan Penolakan <span class="required">*</span>
                    </label>

                    <textarea
                        name="keterangan"
                        id="tolak_keterangan"
                        rows="3"
                        required
                        placeholder="Contoh: Kadar air terlalu tinggi..."></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button"
                    class="btn-outline"
                    onclick="openConfirmCancelTolak()">
                    Batal
                </button>

                <button type="button"
                    class="btn-danger"
                    onclick="openConfirmTolak()">
                    Tolak Setoran
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modalConfirmTolak">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Konfirmasi Penolakan</h3>
        <p>
            Anda yakin ingin menolak setoran ini?<br>
            Setoran akan diberi status ditolak.
        </p>

        <div class="modal-action center">
            <button type="button"
                class="btn-outline"
                onclick="backToTolak()">
                Batal
            </button>

            <button type="button"
                class="btn-danger"
                onclick="submitVerif('ditolak')">
                Konfirmasi
            </button>
        </div>

    </div>
</div>

<div class="modal" id="modalSuccessTolak">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>

        <h3>Berhasil</h3>
        <p>Setoran berhasil ditolak.</p>

    </div>
</div>