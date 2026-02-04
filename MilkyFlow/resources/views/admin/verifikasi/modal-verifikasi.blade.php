<div class="modal-overlay" id="modalOverlay"></div>

<div class="modal" id="modalVerifikasiSetoran">
    <div class="modal-box medium">

        <div class="modal-header">
            <h3>Verifikasi Setoran</h3>
            <button class="modal-close" onclick="closeModal('modalVerifikasiSetoran')">&times;</button>
        </div>

        <div class="setoran-info">

            <div class="setoran-top">
                <h4>Suyanto</h4>
                <span class="badge-grade">Grade A</span>
            </div>

            <div class="setoran-row">
                <span class="label">Waktu Setoran</span>
                <span class="value">Pagi, 23 Januari 2025</span>
            </div>

            <div class="setoran-row">
                <span class="label">Jumlah Liter</span>
                <span class="value">125 Liter</span>
            </div>

            <div class="setoran-row">
                <span class="label">Keterangan</span>
                <span class="value">Susu segar, kualitas baik</span>
            </div>

            <div class="form-group full">
                <label>Keterangan <span>*</span></label>
                <textarea placeholder="Masukkan keterangan"></textarea>
            </div>

            <div class="modal-action space-between">
                <button type="button" class="btn-danger" onclick="openConfirmTolak()">
                    Tolak
                </button>
                <button type="button" class="btn-success" onclick="openConfirmTerima()">
                    Terima
                </button>

            </div>

        </div>
    </div>
</div>

<div class="modal" id="modalConfirmTerima">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Konfirmasi Verifikasi Setoran</h3>
        <p>
            Anda yakin ingin menerima setoran susu ini?<br>
            Setoran yang diterima akan dihitung dalam proses pembayaran.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="cancelVerifikasi()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="confirmTerima()">
                Konfirmasi
            </button>
        </div>

    </div>
</div>


<div class="modal" id="modalTerimaSuccess">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>

        <h3>Berhasil</h3>
        <p>Setoran susu berhasil diverifikasi.</p>

    </div>
</div>

<div class="modal" id="modalConfirmTolak">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Konfirmasi Penolakan Setoran</h3>
        <p>
            Anda yakin ingin menolak setoran susu ini?<br>
            Setoran yang ditolak tidak akan dihitung dalam pembayaran.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="cancelVerifikasi()">
                Batal
            </button>
            <button type="button" class="btn-primary" onclick="confirmTolak()">
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
        <p>Setoran susu berhasil ditolak.</p>

    </div>
</div>