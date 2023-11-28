<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- judul -->
<div class="container">
<style>
    h2 {
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
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); 
}

    .info {
            color: #0c5460;
            background-color: #d1ecf1;
            border-color: #bee5eb;
        }

  </style>

  <img src="/assets/img/indomaret.jpeg" alt="Deskripsi Gambar" style="width: 100%; max-height: 120px;">
  <h2>Kasir</h2>
  
<!-- judul -->
<div class="container">

    <div class="table-responsive">
    <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
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
    <nav aria-label="Page navigation example">
        <nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
<div><p></p></div>
    <div class="alert info">
    <strong>Info:</strong> Jika terdapat kesalahan input mohon hubungi Admin Gudang.</div>
    </div>
    </div> 
<?= $this->endSection() ?>
