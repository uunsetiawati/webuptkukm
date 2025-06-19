    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Tambah Pengumuman</h5>
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('admin/pengumuman/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label class="form-label">Judul</label>
                      <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Deskripsi</label>                      
                        <textarea name="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>status</label>
                        <select name="status" class="form-control">
                        <?php foreach ($pengumuman as $s): ?>
                            <option value="<?= $s ?>"><?= $s ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Link Youtube</label>
                      <input type="text" name="yt" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Gambar</label>
                      <!-- <input type="text" name="isi" class="form-control"> -->
                       <input type="file" name="gambar" class="form-control" accept="image/*" onchange="validateFileSize(this)" required>
                       <span id="file-error" style="color: red; font-size: 0.9em;"></span>
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
