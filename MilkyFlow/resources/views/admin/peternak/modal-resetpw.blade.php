<div class="modal" id="modalReset">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-key"></i>
        </div>

        <h3>Reset Password Akun</h3>
        <p>
            Anda yakin ingin mereset password untuk akun dengan email:<br>
            <strong id="resetEmail">email@email.com</strong>?<br><br>
            Sistem akan mengirimkan <b>link reset password</b> ke email tersebut.
        </p>

        <div class="modal-action center">
            <button type="button" class="btn-outline" onclick="closeReset()">
                Batal
            </button>

            <button type="button" class="btn-primary" onclick="confirmReset()">
                Reset Password
            </button>
        </div>

    </div>
</div>


<div class="modal" id="modalResetSuccess">
    <div class="modal-box small modal-center">

        <div class="modal-icon success">
            <i class="fa-solid fa-check"></i>
        </div>
        <p>
            Link reset password berhasil dikirim ke:<br>
            <strong id="resetSuccessEmail">email@email.com</strong>.<br><br>
            Silakan cek inbox atau folder spam.
        </p>

    </div>
</div>