let currentSetoranId = null;

function openModalTerima(button) {

    currentSetoranId = button.dataset.id;

    const row = button.closest('tr');

    document.getElementById('terima_nama').innerText = row.children[1].innerText;
    document.getElementById('terima_tanggal').innerText = row.children[2].innerText;
    document.getElementById('terima_jumlah').innerText = row.children[4].innerText;
    document.getElementById('terima_kadar').innerText = row.children[5].innerText;

    document.getElementById('formTerima').action =
        `/admin/verifikasi/${currentSetoranId}`;

    document.getElementById('modalTerima').classList.add('show');
    document.getElementById('modalTerimaOverlay').classList.add('show');
}

function openModalTolak(button) {

    currentSetoranId = button.dataset.id;

    const row = button.closest('tr');

    document.getElementById('tolak_nama').innerText =
        row.children[1].innerText;

    document.getElementById('tolak_tanggal').innerText =
        row.children[2].innerText;

    document.getElementById('tolak_jumlah').innerText =
        row.children[4].innerText;

    document.getElementById('tolak_kadar').innerText =
        row.children[5].innerText;

    document.getElementById('formTolak').action =
        `/admin/verifikasi/${currentSetoranId}`;

    document.getElementById('modalTolak').classList.add('show');
    document.getElementById('modalTolakOverlay').classList.add('show');
}

function openConfirmSaveVerif() {

    document.getElementById('modalTerima')
        .classList.remove('show');

    document.getElementById('modalConfirmVerif')
        .classList.add('show');
}

function openConfirmTolak() {

    const alasan =
        document.getElementById('tolak_keterangan').value;

    if (!alasan) {
        alert("Silakan isi alasan penolakan.");
        return;
    }

    document.getElementById('modalTolak')
        .classList.remove('show');

    document.getElementById('modalConfirmTolak')
        .classList.add('show');
}

function backToVerif() {

    document.querySelectorAll('.modal')
        .forEach(m => m.classList.remove('show'));

    document.getElementById('modalTerima')
        .classList.add('show');
}

function backToTolak() {

    document.querySelectorAll('.modal')
        .forEach(m => m.classList.remove('show'));

    document.getElementById('modalTolak')
        .classList.add('show');
}

function cancelVerif() {

    document.querySelectorAll('.modal')
        .forEach(m => m.classList.remove('show'));

    document.getElementById('modalTerimaOverlay')
        .classList.remove('show');

    document.getElementById('modalTolakOverlay')
        .classList.remove('show');
}

function submitVerif(status) {

    let form;

    if (status === 'diterima') {
        form = document.getElementById('formTerima');
    } else {
        form = document.getElementById('formTolak');
    }

    const url = `/admin/verifikasi/${currentSetoranId}`;
    const formData = new FormData(form);

    formData.set('status_setor', status);

    fetch(url, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json"
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        if (!data.success) return;

        document.querySelectorAll('.modal')
            .forEach(m => m.classList.remove('show'));

        document.getElementById('modalTerimaOverlay')
            .classList.remove('show');

        document.getElementById('modalTolakOverlay')
            .classList.remove('show');


        const button = document.querySelector(
            `button[data-id="${currentSetoranId}"]`
        );

        if (button) {

            const row = button.closest('tr');
            const badge = row.querySelector('.badge');

            badge.classList.remove('warning','success','danger');

            if (status === 'diterima') {
                badge.classList.add('success');
                badge.innerText = "Diterima";
            } else {
                badge.classList.add('danger');
                badge.innerText = "Ditolak";
            }

            row.querySelectorAll('.approve, .reject')
                .forEach(btn => btn.remove());
        }

        if (status === 'diterima') {
            const success =
                document.getElementById('modalSuccessVerif');

            success.classList.add('show');

            setTimeout(() => {
                success.classList.remove('show');
            }, 1500);
        }

        // SUCCESS TOLAK
        else {
            const success =
                document.getElementById('modalSuccessTolak');

            success.classList.add('show');

            setTimeout(() => {
                success.classList.remove('show');
            }, 1500);
        }

    })
    .catch(error => {
        console.log(error);
    });
}