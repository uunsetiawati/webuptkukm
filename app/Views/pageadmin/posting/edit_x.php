<h2>Edit Posting</h2>
<form action="<?= base_url('admin/posting/update/' . $posting['id']) ?>" method="post">
  <input type="text" name="judul" value="<?= $posting['judul'] ?>"><br>
  <input type="text" name="kategori" value="<?= $posting['kategori'] ?>"><br>
  <textarea name="isi"><?= $posting['isi'] ?></textarea><br>
  <select name="status">
    <option value="draft" <?= $posting['status'] == 'draft' ? 'selected' : '' ?>>Draft</option>
    <option value="publish" <?= $posting['status'] == 'publish' ? 'selected' : '' ?>>Publish</option>
  </select><br>
  <button type="submit">Update</button>
</form>
