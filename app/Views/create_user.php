<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>
<nav class="navbar bg-body-tertiary">
    <!-- navbar -->
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      Indoapril
    </a>    
  </div>
</nav><br>
<div class="container">
    <form action="<?=base_url("user1/store");?>" method="POST">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_user')) ? 'is-invalid' : '';?>" name="nama_user" value="<?= old('nama_user'); ?>">
            <div class="invalid-feedback">
                <?= $validation->getError('nama_user') ;?>
            </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="jabatan" name="jabatan">
                    <?php foreach($jabatan as $item):?>
                        <option value="<?=$item['id']?>"><?=$item['nama_jabatan']?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="npm" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '';?>" name="password" value="<?= old('password'); ?>">
                <div class="invalid-feedback">
                <?= $validation->getError('password') ;?>
            </div>
            </div>
        </div>
        <input type="submit" name="tambah_data" value="Tambah Data" class="btn btn-primary">
        <a href="/user1" class="btn btn-danger">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>