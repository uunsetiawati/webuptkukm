<h2>Tambah Posting</h2>
<form action="<?= base_url('admin/posting/store') ?>" method="post">
  <input type="text" name="judul" placeholder="Judul"><br>
  <input type="text" name="kategori" placeholder="Kategori"><br>
  <textarea name="isi" id="editor" placeholder="Isi artikel"></textarea><br>
  <select name="status">
    <option value="draft">Draft</option>
    <option value="publish">Publish</option>
  </select><br>
  <button type="submit">Simpan</button>
</form>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
