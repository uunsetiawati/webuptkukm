    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Pengaturan</h5>
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('admin/pengaturan/update/'.$segment4) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Sejarah</label>
                        <textarea name="sejarah" class="form-control" required style="height:10px"><?= $pengaturan['sejarah'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" required>Visi</label>                      
                        <textarea name="visi" class="form-control" required><?= $pengaturan['visi'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" required>Misi</label>                      
                        <textarea name="misi" class="form-control" required><?= $pengaturan['misi'] ?></textarea>
                    </div>   
                    <div class="mb-3">
                        <label class="form-label" required>TU</label>                      
                        <textarea name="tu" class="form-control" required><?= $pengaturan['tu'] ?></textarea>
                    </div>  
                    <div class="mb-3">
                        <label class="form-label" required>Pengembangan</label>                      
                        <textarea name="pengembangan" class="form-control" required><?= $pengaturan['pengembangan'] ?></textarea>
                    </div>  
                    <div class="mb-3">
                        <label class="form-label" required>Penyelenggara</label>                      
                        <textarea name="penyelenggara" class="form-control" required><?= $pengaturan['penyelenggara'] ?></textarea>
                    </div> 
                    <div class="mb-3">
                        <label class="form-label" required>Widyaiswara</label>                      
                        <textarea name="wi" class="form-control" required><?= $pengaturan['wi'] ?></textarea>
                    </div> 
                    <div class="mb-3">
                      <label class="form-label">Gambar Profil</label><br>
                      <?php if (!empty($pengaturan['gambar'])): ?>
                        <!-- Jika thumbnail ada, tampilkan gambar dan tombol hapus -->
                        <img src="<?= base_url('uploads/pengaturan/' . $pengaturan['gambar']) ?>" width="150" class="img-thumbnail mb-2">
                        <br>
                        <?php if (!empty($pengaturan['gambar'])): ?>
                          <input type="hidden" name="gambar_lama" value="<?= esc($pengaturan['gambar']) ?>">
                        <?php endif; ?>

                        <button type="button" class="btn btn-danger btn-sm" id="btn-delete-pengaturan" data-id="<?= $pengaturan['id'] ?>">
                          <i class="fa fa-trash"></i> Hapus Gambar
                        </button>
                      <?php else: ?>
                        <!-- Jika thumbnail belum ada, tampilkan input file -->
                        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="validateFileSize(this)" required>
                        <span id="file-error" style="color: red; font-size: 0.9em;"></span>
                      <?php endif; ?>
                    </div>              
                    <div class="mb-3">
                      <label class="form-label">Gambar Struktur</label><br>
                      <?php if (!empty($pengaturan['struktur'])): ?>
                        <!-- Jika thumbnail ada, tampilkan gambar dan tombol hapus -->
                        <img src="<?= base_url('uploads/pengaturan/struktur/' . $pengaturan['struktur']) ?>" width="150" class="img-thumbnail mb-2">
                        <br>
                        <?php if (!empty($pengaturan['struktur'])): ?>
                          <input type="hidden" name="struktur_lama" value="<?= esc($pengaturan['struktur']) ?>">
                        <?php endif; ?>

                        <button type="button" class="btn btn-danger btn-sm" id="btn-delete-struktur" data-id="<?= $pengaturan['id'] ?>">
                          <i class="fa fa-trash"></i> Hapus Struktur
                        </button>
                      <?php else: ?>
                        <!-- Jika thumbnail belum ada, tampilkan input file -->
                        <input type="file" name="struktur" class="form-control" accept="image/*" onchange="validateFileSizeStruktur(this)" required>
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
        function validateFileSizeStruktur(input) {
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
          $('#btn-delete-pengaturan').click(function () {
            const postId = $(this).data('id');

            Swal.fire({
              title: 'Hapus Gambar Pengaturan?',
              text: 'Gambar Pengaturan akan dihapus secara permanen!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Ya, hapus!',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '<?= base_url('admin/pengaturan/deletePengaturan') ?>/' + postId,
                  type: 'POST',
                  data: {
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                  },
                  success: function (response) {
                    Swal.fire(
                      'Berhasil!',
                      'Gambar Pengaturan berhasil dihapus.',
                      'success'
                    ).then(() => {
                      location.reload(); // refresh halaman
                    });
                  },
                  error: function () {
                    Swal.fire(
                      'Gagal!',
                      'Tidak dapat menghapus gambar pengaturan.',
                      'error'
                    );
                  }
                });
              }
            });
          });

          $('#btn-delete-struktur').click(function () {
            const postId = $(this).data('id');

            Swal.fire({
              title: 'Hapus Gambar Struktur?',
              text: 'Gambar Struktur Organisasi akan dihapus secara permanen!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Ya, hapus!',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '<?= base_url('admin/pengaturan/deleteStruktur') ?>/' + postId,
                  type: 'POST',
                  data: {
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                  },
                  success: function (response) {
                    Swal.fire(
                      'Berhasil!',
                      'Gambar Struktur Organisasi berhasil dihapus.',
                      'success'
                    ).then(() => {
                      location.reload(); // refresh halaman
                    });
                  },
                  error: function () {
                    Swal.fire(
                      'Gagal!',
                      'Tidak dapat menghapus gambar struktur organisasi.',
                      'error'
                    );
                  }
                });
              }
            });
          });
        });
      </script>
