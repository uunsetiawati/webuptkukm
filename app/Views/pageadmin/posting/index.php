<h2>Daftar Posting</h2>
<a href="<?= base_url('admin/posting/create') ?>">Tambah Baru</a>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="<?=base_url('adminaset/assets/images/logos/favicon.png')?>" />
  <link rel="stylesheet" href="<?=base_url('adminaset/assets/css/styles.min.css')?>" />
  
  <!-- Include jQuery & DataTables CSS + JS -->   
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> 
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>

<table id="table-posting" class="display">
  <thead>
    <tr>
      <th>Judul</th>
      <th>Kategori</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($posting as $row): ?>
      <tr>
        <td><?= esc($row['judul']) ?></td>
        <td><?= esc($row['kategori']) ?></td>
        <td><?= esc($row['status']) ?></td>
        <td>
          <a href="<?= base_url('admin/posting/edit/' . $row['id']) ?>">Edit</a>
          <a href="<?= base_url('admin/posting/delete/' . $row['id']) ?>" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </body>
<script>
  $(document).ready(function() {
    $('#table-posting').DataTable({
      pageLength: 10,
      lengthChange: true,
      searching: true,
      ordering: true
    });
  });
</script>

