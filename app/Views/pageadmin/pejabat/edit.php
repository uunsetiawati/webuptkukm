    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Edit Pajabat</h5>
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('admin/pejabat/update/'.$segment4) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" value="<?= $pejabat['nama'] ?>"  class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Jabatan</label>
                        <select name="jabatan" class="form-control">
                        <?php foreach ($jabatan as $j): ?>
                            <option value="<?= $j ?>" <?= $j == $pejabat['jabatan'] ? 'selected' : '' ?>><?= $j ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>                    
                    <div class="mb-3">
                      <label class="form-label" required>Detail Jabatan</label>                      
                        <textarea name="detail" class="form-control" required><?= $pejabat['detail'] ?></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar</label><br>
                      <?php if (!empty($pejabat['gambar'])): ?>
                        <!-- Jika thumbnail ada, tampilkan gambar dan tombol hapus -->
                        <img src="<?= base_url('uploads/pejabat/' . $pejabat['gambar']) ?>" width="150" class="img-thumbnail mb-2">
                        <br>
                        <?php if (!empty($pejabat['gambar'])): ?>
                          <input type="hidden" name="gambar_lama" value="<?= esc($pejabat['gambar']) ?>">
                        <?php endif; ?>

                        <button type="button" class="btn btn-danger btn-sm" id="btn-delete-pejabat" data-id="<?= $pejabat['id'] ?>">
                          <i class="fa fa-trash"></i> Hapus Gambar
                        </button>
                      <?php else: ?>
                        <!-- Jika thumbnail belum ada, tampilkan input file -->
                        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="validateFileSize(this)" required>
                        <span id="file-error" style="color: red; font-size: 0.9em;"></span>
                      <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
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
