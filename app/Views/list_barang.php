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
  .info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }
  </style>
      <h1>Admin Gudang</h1>
      <div class="alert info">
      <strong>Dashboard:</strong> Hai Admin, Welcome to Dashboard! </div> 
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang Gudang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatables" class="table table-bordered table-hover"  width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Stok</th>
                <th>Aksi</th>
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
                    <td class="d-flex">
                    
                     
                    <a href="/user3/create" type="submit" class="btn btn-primary" style="margin-left: 5px;">Add</a>
                    <a href="<?= base_url('/user3/' . $user['id'] . '/edit') ?>" class="btn btn-warning" style="margin-left: 5px; margin-right: 5px;">Edit</a>

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