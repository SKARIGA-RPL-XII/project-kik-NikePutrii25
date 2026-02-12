document.addEventListener('DOMContentLoaded', function () {

    const formSetoran = document.getElementById('formSetoran');
    const btnBatal = document.getElementById('btnBatal');

    if (formSetoran) {
        formSetoran.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Simpan Setoran?',
                text: 'Pastikan data jumlah susu sudah benar!',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1E3A8A',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Cek Lagi',
                reverseButtons: true
            }).then((result) => {

                if (result.isConfirmed) {

                    Swal.fire({
                        title: 'Menyimpan...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    const formData = new FormData(formSetoran);

                    fetch(formSetoran.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Gagal menyimpan');
                            }
                            return response.text();
                        })
                        .then(() => {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data setoran Anda berhasil disimpan.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.reload();
                            });
                        })
                        .catch(() => {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Terjadi kesalahan saat menyimpan data.',
                                icon: 'error'
                            });
                        });
                }
            });
        });
    }

    if (btnBatal) {
        btnBatal.addEventListener('click', function () {
            Swal.fire({
                title: 'Batalkan input?',
                text: 'Data yang sudah diisi tidak akan tersimpan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#64748B',
                confirmButtonText: 'Ya, Batalkan',
                cancelButtonText: 'Lanjut Isi',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    const modalEl = document.getElementById('modalInputSetoran');
                    const modalInstance = bootstrap.Modal.getInstance(modalEl);
                    modalInstance.hide();

                    formSetoran.reset();
                }
            });
        });
    }
});

document.querySelectorAll('.formEditSetoran').forEach(function (form) {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Update Setoran?',
            text: 'Perubahan data akan disimpan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D97706',
            cancelButtonColor: '#64748B',
            confirmButtonText: 'Ya, Update',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (!result.isConfirmed) return;

            Swal.fire({
                title: 'Menyimpan perubahan...',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });

            form.submit();
        });
    });
});
