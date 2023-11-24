<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<nav class="navbar bg-body-tertiary">
  <!-- navbar -->
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      UAP Web lanjut
    </a>

    <a class="navbar-brand" href="<?= base_url('/user4') ?>">
      Barang
    </a>

    <a class="navbar-brand" href="<?= base_url('/keluar') ?>">
      Penjualan
    </a>
  </div>
</nav><br>

<!-- judul -->
<div class="container">
  <figure>
    <h1>Data Barang Di Dalam Gudang</h1>
    <blockquote class="blockquote">
      <p>Jika terdapat kesalahan input mohon hubungi Admin Gudang</p>
    </blockquote>
    <figcaption class="blockquote-footer">
      CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
    </figcaption>
  </figure>
  <div class="table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Jenis</th>
          <th>Merk</th>
          <th>Stok</th>
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
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>