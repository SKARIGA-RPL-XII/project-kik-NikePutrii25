<div class="modal-overlay" id="modalTerimaOverlay"></div>

<div class="modal" id="modalTerima">
    <div class="modal-box">
        <div class="modal-header-container">
            <h3>Verifikasi Setoran</h3>
            <div class="modal-divider"></div>
        </div>

        <form method="POST" id="formTerima">
            @csrf
            @method('PUT')

            <input type="hidden" name="status_setor" value="diterima">
            <input type="hidden" name="id_setoran" id="terima_id_setoran">

            <div class="detail-grid">
                <div class="detail-item">
                    <label>Peternak</label>
                    <span id="terima_nama">—</span>
                </div>
                <div class="detail-item">
                    <label>Tanggal</label>
                    <span id="terima_tanggal">—</span>
                </div>
                <div class="detail-item">
                    <label>Jumlah (Liter)</label>
                    <span class="value-highlight"><span id="terima_jumlah">0</span>
                </div>
                <div class="detail-item">
                    <label>Kadar Air</label>
                    <span class="value-highlight"><span id="terima_kadar">0</span>
                </div>
            </div>

            <div class="form-body">
                <div class="form-group">
                    <label for="id_kelompok">Kelompok / Grade <span class="required">*</span></label>
                    <div class="select-wrapper">
                        <select name="id_kelompok" id="id_kelompok" required>
                            <option value="" disabled selected>Pilih Grade Kualitas...</option>
                            @foreach($kelompok as $item)
                                <option value="{{ $item->id_kelompok }}">
                                    {{ $item->nama_kelompok }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        placeholder="Contoh: Susu dalam kondisi sangat baik..."></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-outline" onclick="openConfirmCancelVerif()">
                    Batal
                </button>

                <button type="button" class="btn-success" onclick="submitVerif('diterima')">
                    Terima Setoran
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal" id="modalCancelVerif">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Batalkan Verifikasi?</h3>
        <p>
            Data verifikasi belum disimpan.<br>
            Anda yakin ingin membatalkan dan keluar?
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="backToVerif()">
                Kembali
            </button>

            <button type="button" class="btn-primary" onclick="cancelVerif()">
                Konfirmasi
            </button>
        </div>
    </div>
</div>

<div class="modal" id="modalConfirmVerif">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-exclamation"></i>
        </div>

        <h3>Konfirmasi Verifikasi</h3>
        <p>
            Anda yakin ingin menerima setoran ini?<br>
            Pastikan data sudah benar.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="backToVerif()">
                Batal
            </button>

            <button type="button" class="btn-primary" onclick="submitVerif('diterima')">
                Konfirmasi
            </button>
        </div>
    </div>
</div>

<div class="modal" id="modalSuccessVerif">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>

        <h3>Berhasil</h3>
        <p>Setoran berhasil diverifikasi.</p>

    </div>
</div>