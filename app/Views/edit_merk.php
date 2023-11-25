<?= $this->extend('templates/index_ag'); ?>

<?= $this->section('page-content'); ?>

<nav class="navbar bg-body-tertiary">
    <!-- navbar -->
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      UAP Web lanjut
    </a>    
  </div>
</nav><br>
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
        <a href="/3" class="btn btn-danger">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>