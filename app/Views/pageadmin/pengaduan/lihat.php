    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Pengaduan</h5>
              <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" value="<?= $pengaduan['nama'] ?>"  class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Email</label>
                       <input type="text" name="email" value="<?= $pengaduan['email'] ?>"  class="form-control" required>
                    </div>    
                    <div class="mb-3">
                      <label class="form-label" required>Subject</label>
                       <input type="text" name="subject" value="<?= $pengaduan['subject'] ?>"  class="form-control" required>
                    </div>                 
                    <div class="mb-3">
                      <label class="form-label" required>Pesan</label>                      
                        <textarea name="pesan" cols="30" rows="9" class="form-control" required><?= $pengaduan['pesan'] ?></textarea>
                    </div>
                    <button class="btn btn-primary" onclick="history.back()">Kembali</button>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>

      <script>
        function validateFileSize(input) {
          const file = input.files[0];
          const maxSize = 5 * 1024 * 1024; // 5MB
          const errorSpan = document.getElementById('file-error');

          if (file && file.size > maxSize) {
            errorSpan.textContent = "Ukuran file melebihi 5MB. Silakan pilih file yang lebih kecil.";
            input.value = ""; // Reset input file
          } else {
            errorSpan.textContent = ""; // Bersihkan pesan jika valid
          }
        }
      </script>

      <script>
        $(document).ready(function () {
          $('#btn-delete-pejabat').click(function () {
            const postId = $(this).data('id');

            Swal.fire({
              title: 'Hapus Gambar Pejabat?',
              text: 'Gambar Pejabat akan dihapus secara permanen!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Ya, hapus!',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '<?= base_url('admin/pejabat/deletePejabat') ?>/' + postId,
                  type: 'POST',
                  data: {
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                  },
                  success: function (response) {
                    Swal.fire(
                      'Berhasil!',
                      'Gambar Pejabat berhasil dihapus.',
                      'success'
                    ).then(() => {
                      location.reload(); // refresh halaman
                    });
                  },
                  error: function () {
                    Swal.fire(
                      'Gagal!',
                      'Tidak dapat menghapus gambar pejabat.',
                      'error'
                    );
                  }
                });
              }
            });
          });
        });
      </script>
