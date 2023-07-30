Dropzone.autoDiscover = false;
$(document).ready(function() {

    // kode untuk membuat upload dengan dropzone
    var myDropzone = new Dropzone('form.dropzone', {
        autoProcessQueue: false,
        maxFiles: 1,
        acceptedFiles: 'image/*',
        dictInvalidFileType: 'Hanya bisa mengupload gambar.',
        addRemoveLinks: true,
    });

    // aksi untuk melakukan upload dropzone file pada saat tombol upload di klik
    $('#btn-upload').on('click', function() {
        if (!myDropzone.files || !myDropzone.files.length) {
            Swal.fire('Mohon Maaf', 'Anda harus memilih file terlebih dahulu', 'warning');
        } else {
            if (myDropzone.files[0].size > 1260137) {
                Swal.fire('Mohon Maaf', 'File terlalu besar, max file = 1.2mb', 'warning');
            } else {
                Swal.fire({
                    title: 'Apakah yakin?',
                    text: "File foto akan di kirim ke yayasan!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Konfirmasi'
                }).then((result) => {
                    if (result.value) {
                        let dataPembayaran = $(this).data('pembayaran');
                        let fileType = myDropzone.files[0].name.split('.').pop();
                        if (fileType == 'jpeg') {
                            fileType = 'jpg';
                        } else {
                            fileType = 'jpg';
                        }
                        fileType = fileType.toLowerCase();
                        // let fileType = myDropzone.files[0].type.split('/').pop();
                        let buktiPembayaran = dataPembayaran.bukti_pembayaran + "." + fileType;

                        myDropzone.processQueue();
                        myDropzone.on('complete', function(file) {
                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/mahasiswa/tambah_pembayaran',
                                method: 'post',
                                data: { id_mahasiswa: dataPembayaran.id_mahasiswa, bukti_pembayaran: buktiPembayaran, tgl_registrasi: dataPembayaran.tgl_registrasi, status_registrasi: dataPembayaran.status_registrasi, jumlah_pembayaran: dataPembayaran.jumlah_pembayaran, jenis_registrasi: dataPembayaran.jenis_registrasi },
                                success: function(data) {
                                    if (data == 1) {
                                        setTimeout(() => {
                                            location.reload();
                                        }, 1000);
                                    }
                                },
                                error: function(data) {
                                    console.log(data);
                                }
                            });
                        });
                    }
                })
            }
        }
    });
});