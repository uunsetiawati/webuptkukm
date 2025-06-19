    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Tambah Post</h5>
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('admin/posting/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label class="form-label">Judul</label>
                      <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Kategori</label>
                      <!-- <input type="text" name="kategori" class="form-control"> -->
                        <select name="kategori" class="form-control">
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Jenis</label>
                        <select name="jenis" class="form-control">
                        <?php foreach ($jenis as $j): ?>
                            <option value="<?= $j ?>"><?= $j ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Isi</label>
                      <!-- <input type="text" name="isi" class="form-control"> -->
                       <textarea name="isi" id="editor" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Status</label>
                      <!-- <input type="text" name="kategori" class="form-control"> -->
                        <select name="status" class="form-control">
                        <?php foreach ($status as $k): ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Thumbnail</label>
                      <!-- <input type="text" name="isi" class="form-control"> -->
                       <input type="file" name="thumbnail" class="form-control" name="thumbnail" accept="image/*" onchange="validateFileSize(this)" required>
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

      <!-- Inisialisasi CKEditor -->
      <script>
          ClassicEditor
              .create(document.querySelector('#editor'))
              .catch(error => {
                  console.error(error);
              });
      </script>