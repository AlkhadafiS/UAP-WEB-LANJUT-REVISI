<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            UAP Web lanjut
        </a>
    </div>
</nav><br>

<div class="container">
    <form class="container" action="<?= base_url('transaksi/' . $transaksi_id) ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">

        <?= csrf_field() ?>
        <div class="mb-3 row">
            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                    <?php foreach ($jenis as $item) : ?>
                        <option value="<?= $item['id'] ?>" <?= $transaksi['id_jenis'] == $item['id'] ? 'selected' : '' ?>>
                            <?= $item['nama_jenis'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('nama_merk')) ? 'is-invalid' : ''; ?>" name="nama_merk" value="<?= $transaksi['nama_merk'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_merk'); ?>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="transaksi" class="col-sm-2 col-form-label">Transaksi</label>
            <div class="col-sm-10">
                <input class="form-control <?= ($validation->hasError('transaksi')) ? 'is-invalid' : ''; ?>" name="transaksi" value="<?= $transaksi['transaksi'] ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('transaksi'); ?>
                </div>
            </div>
        </div>
        <input type="submit" name="ubah_data" value="Ubah Data" class="btn btn-primary">
        <a href="/transaksi" class="btn btn-danger">Kembali</a>
    </form>
    <!--  -->
</div>

<?= $this->endSection() ?>