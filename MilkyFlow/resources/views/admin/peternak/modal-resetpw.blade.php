<div class="modal" id="modalReset">
    <div class="modal-box small modal-center">

        <div class="modal-icon warning">
            <i class="fa-solid fa-key"></i>
        </div>

        <h3>Reset Password Akun</h3>
        <p>
            Anda yakin ingin mereset password untuk akun<br>
            dengan email:<br>
            <strong id="resetEmail">email@email.com</strong>?<br><br>
            Password baru akan dikirimkan ke email tersebut.
        </p>

        <div class="modal-action center">
            <button
                type="button"
                class="btn-outline"
                onclick="closeReset()">
                Batal
            </button>

            <button
                type="button"
                class="btn-primary"
                onclick="confirmReset()">
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
            Password baru telah berhasil dikirim ke<br>
            <strong id="resetSuccessEmail">email@email.com</strong>.
        </p>

    </div>
</div>
