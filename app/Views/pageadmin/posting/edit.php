    <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Tambah Post</h5>
              <div class="card">
                <div class="card-body">
                  <form action="<?= base_url('admin/posting/update/'.$segment4) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label class="form-label">Judul</label>
                      <input type="text" name="judul" value="<?= $posting['judul'] ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Kategori</label>
                      <!-- <input type="text" name="kategori" class="form-control"> -->
                        <select name="kategori" class="form-control">
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k ?>" <?= $k == $posting['kategori'] ? 'selected' : '' ?>><?= $k ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Jenis</label>
                        <select name="jenis" class="form-control">
                        <?php foreach ($jenis as $j): ?>
                            <option value="<?= $j ?>" <?= $j == $posting['jenis'] ? 'selected' : '' ?>><?= $j ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Isi</label>
                      <!-- <input type="text" name="isi" class="form-control"> -->
                       <textarea name="isi" id="editor" class="form-control"><?=$posting['isi']?></textarea>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" required>Status</label>
                      <!-- <input type="text" name="kategori" class="form-control"> -->
                        <select name="status" class="form-control">
                        <?php foreach ($status as $k): ?>
                            <option value="<?= $k ?>" <?= $k == $posting['status'] ? 'selected' : '' ?>><?= $k ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Thumbnail</label><br>
                      <?php if (!empty($posting['thumbnail'])): ?>
                        <!-- Jika thumbnail ada, tampilkan gambar dan tombol hapus -->
                        <img src="<?= base_url('uploads/thumbnails/' . $posting['thumbnail']) ?>" width="150" class="img-thumbnail mb-2">
                        <br>
                        <?php if (!empty($posting['thumbnail'])): ?>
                          <input type="hidden" name="thumbnail_lama" value="<?= esc($posting['thumbnail']) ?>">
                        <?php endif; ?>

                        <button type="button" class="btn btn-danger btn-sm" id="btn-delete-thumbnail" data-id="<?= $posting['id'] ?>">
                          <i class="fa fa-trash"></i> Hapus Thumbnail
                        </button>
                      <?php else: ?>
                        <!-- Jika thumbnail belum ada, tampilkan input file -->
                        <input type="file" name="thumbnail" class="form-control" accept="image/*" required>
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
        $(document).ready(function () {
          $('#btn-delete-thumbnail').click(function () {
            const postId = $(this).data('id');

            Swal.fire({
              title: 'Hapus Thumbnail?',
              text: 'Thumbnail akan dihapus secara permanen!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#d33',
              cancelButtonColor: '#3085d6',
              confirmButtonText: 'Ya, hapus!',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: '<?= base_url('admin/posting/deleteThumbnail') ?>/' + postId,
                  type: 'POST',
                  data: {
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                  },
                  success: function (response) {
                    Swal.fire(
                      'Berhasil!',
                      'Thumbnail berhasil dihapus.',
                      'success'
                    ).then(() => {
                      location.reload(); // refresh halaman
                    });
                  },
                  error: function () {
                    Swal.fire(
                      'Gagal!',
                      'Tidak dapat menghapus thumbnail.',
                      'error'
                    );
                  }
                });
              }
            });
          });
        });
      </script>

      <!-- Inisialisasi CKEditor -->
      <!-- <script>
          ClassicEditor
              .create(document.querySelector('#editor'))
              .catch(error => {
                  console.error(error);
              });
      </script> -->

      <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                extraPlugins: [ MyCustomUploadAdapterPlugin ]
            })
            .catch(error => {
                console.error(error);
            });

        function MyCustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new MyUploadAdapter(loader);
            };
        }

        class MyUploadAdapter {
            constructor(loader) {
                this.loader = loader;
            }

            upload() {
                return this.loader.file.then(file => new Promise((resolve, reject) => {
                    const data = new FormData();
                    data.append('upload', file);

                    fetch("<?= base_url('admin/posting/uploadImage') ?>", {
                        method: "POST",
                        body: data
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (result.url) {
                            resolve({ default: result.url });
                        } else {
                            reject(result.error?.message || 'Upload failed');
                        }
                    })
                    .catch(error => {
                        reject('Upload failed: ' + error.message);
                    });
                }));
            }

            abort() {
                // optional
            }
        }
      </script>
