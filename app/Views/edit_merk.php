<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<nav class="navbar bg-body-tertiary">
<style>
    .container {
      background-color: #fff; /* Set background color to white */
      padding: 20px; /* Add some padding for better visual appearance */
      margin-top: 20px; /* Add margin from the top */
      border-radius: 8px; /* Add rounded corners for a softer appearance */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow for depth */
    }
    
  </style>
    <!-- navbar -->
  <div class="container-fluid">   
  <h3>Form Edit Barang</h3>
  </div>
</nav>
<div class="container">
    <form class="container" action=<?= base_url('user3/' . $barang['id']) ?> method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    <?= csrf_field() ?>
    <div class="mb-3 row">
            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                    <?php foreach($jenis as $item):?>
                        <option value="<?=$item['id']?>" <?= $barang['id_jenis'] == $item['id'] ? 'selected' : ''?> >
                        <?= $item['nama_jenis'] ?>
                        </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
    <div class="mb-3 row">
            <label for="nama_merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_merk')) ? 'is-invalid' : '';?>" name="nama_merk" value="<?= $barang['nama_merk'] ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama_merk') ;?>
            </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : '';?>" name="stok" value="<?= $barang['stok'] ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('stok') ;?>
            </div>
            </div>
        </div>
        <input type="submit" name="tambah_data" value="Update Data" class="btn btn-primary">
        <a href="/user3" class="btn btn-danger">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>