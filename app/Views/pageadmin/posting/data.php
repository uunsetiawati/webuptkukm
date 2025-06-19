    <div class="container-fluid">        
        <div class="row">            
          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <a href="<?=site_url('admin/posting')?>" class="btn btn-primary"><i class="fas fa-plus me-1"></i>Tambah Post</a>
                <hr>
                <h5 class="card-title fw-semibold mb-4">Post</h5>
                <div class="table-responsive" style="overflow-x:auto;">
                  <table id="table-posting" class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0" width="5%">
                          <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0" width="30%">
                          <h6 class="fw-semibold mb-0" style="max-width: 150px; overflow: hidden; white-space: wrap; text-overflow: ellipsis;">Judul</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Kategori</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tanggal</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no=1;
                        foreach ($posting as $row): ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td style="max-width: 200px; overflow: hidden; white-space: wrap; text-overflow: ellipsis;"><?= esc($row['judul']) ?></td>
                            <td><?= esc($row['kategori']) ?></td>
                            <td><?= date('d-m-Y', strtotime($row['created_at'])) ?></td>
                            <td><?= esc($row['status']) ?></td>
                            <td>
                            <a href="<?= base_url('admin/posting/edit/' . $row['id']) ?>" class="btn btn-success "><i class="fas fa-edit me-1"></i>Edit</a>
                            <button class="btn btn-danger btn-delete" data-id="<?= $row['id'] ?>"><i class="fas fa-trash me-1"></i>Hapus</button>
                            </td>
                            
                        </tr>
                        <?php endforeach; 
                        $no+1;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>

     <script>
        $(document).ready(function() {
            $('#table-posting').DataTable({
            // responsive: true,
            pageLength: 10,
            lengthChange: true,
            searching: true,
            ordering: true
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function (e) {
                e.preventDefault(); // penting: cegah link default

                const postId = $(this).data('id');

                Swal.fire({
                title: 'Hapus Data Ini?',
                text: 'Data akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '<?= base_url('admin/posting/delete') ?>/' + postId,
                    type: 'POST',
                    data: {
                        '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                    },
                    success: function (response) {
                        Swal.fire(
                        'Berhasil!',
                        'Data berhasil dihapus.',
                        'success'
                        ).then(() => {
                        location.reload(); // refresh halaman
                        });
                    },
                    error: function () {
                        Swal.fire(
                        'Gagal!',
                        'Tidak dapat menghapus data.',
                        'error'
                        );
                    }
                    });
                }
                });
            });
            });

      </script>