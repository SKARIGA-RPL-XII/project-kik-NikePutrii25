const overlay = document.getElementById('modalOverlay');

function show(id) {
    overlay?.classList.add('show');
    document.getElementById(id)?.classList.add('show');
}

function hide(id) {
    document.getElementById(id)?.classList.remove('show');
}

function openVerifikasi() {
    show('modalVerifikasiSetoran');
}

function openConfirmTerima() {
    hide('modalVerifikasiSetoran');
    show('modalConfirmTerima');
}

function confirmTerima() {
    hide('modalConfirmTerima');
    show('modalTerimaSuccess');

    setTimeout(() => {
        hide('modalTerimaSuccess');
        overlay?.classList.remove('show');
    }, 1500);
}

function openConfirmTolak() {
    hide('modalVerifikasiSetoran');
    show('modalConfirmTolak');
}

function confirmTolak() {
    hide('modalConfirmTolak');
    show('modalSuccessTolak');

    setTimeout(() => {
        hide('modalSuccessTolak');
        overlay?.classList.remove('show');
    }, 1500);
}

function cancelVerifikasi() {
    document.querySelectorAll('.modal').forEach(m => m.classList.remove('show'));
    overlay?.classList.remove('show');
}