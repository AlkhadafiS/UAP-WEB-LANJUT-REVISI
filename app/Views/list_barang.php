<?= $this->extend('templates/index_ag'); ?>

<?= $this->section('page-content'); ?>

<!-- judul -->
<div class="container">
  <figure>
    <h1>Data Barang</h1>
    <blockquote class="blockquote">
      <p>Data Barang yang ada didalam database</p>
    </blockquote>
    <figcaption class="blockquote-footer">
      CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
    </figcaption>
  </figure>
  <a href="/user3/create" type="button" class="btn btn-primary">Tambah Barang</a>
  <div class="table-responsive"><br>
    <table class="table align-middle">
      <thead>
        <tr>
          <th>No</th>
          <th>Jenis</th>
          <th>Merk</th>
          <th>Stok</th>
          <th class="d-flex content-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($jenis as $user) {
        ?>
          <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama_jenis'] ?></td>
            <td><?= $user['nama_merk'] ?></td>
            <td><?= $user['stok'] ?></td>
            <td class="d-flex justify-content">
              <a href="<?= base_url('/user3/' . $user['id'] . '/edit') ?>" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
              <form action="<?= base_url('user3/' . $user['id']) ?>" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger" value="Delete" style="width: 80px; height: 40px; padding: 5px;">Delete</button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>