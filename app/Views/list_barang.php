<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>



<!-- judul -->
<div class="container">
<style>
    h1 {
  font-size: 1em; /* Larger font size for impact */
  color: #f8f9fc;
  text-align: center;
  margin-top: 10px;
  letter-spacing: 2px; /* Add some letter spacing for a stylish look */
  text-transform: uppercase; /* Convert text to uppercase for emphasis */
  font-weight: bold; /* Make the text bold for emphasis */
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.0); /* Add a subtle text shadow for depth */
  background-color: #4e73df; /* Background color behind the text */
  padding: 7px; /* Add padding around the text for better visibility */
  border-radius: 5px; /* Add rounded corners for a softer appearance */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3); 
}
    p {
      font-size: 1.2em;
      color: #555;
    }
  </style>
      <h1>Admin Gudang</h1>
      <div><h2>Dashboard</h2>
      <h5>Hai Admin, Welcome to Dashboard</h5></div>
    <p></p>
    <a href="/user3/create" type="button" class="btn btn-primary">Tambah</a>
    <p></p>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
            <tr>
                <th>ID</th>
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
                      <form action="<?=base_url('user3/' . $user['id'])?>" method="POST">
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