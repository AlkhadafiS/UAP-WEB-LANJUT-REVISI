<!-- create_transaksi.php -->
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            Indoapril
        </a>
    </div>
</nav><br>

<div class="container">
    <form action="<?= base_url("user3/store_transaksi"); ?>" method="POST">
        <div class="mb-3 row">
            <label for="jenis" class="col-sm-2 col-form-label">Jenis</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                    <?php foreach ($jenis as $item) : ?>
                        <option value="<?= $item['id'] ?>"><?= $item['nama_jenis'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Barang Masuk</label>
            <div class="col-sm-10">
                <input type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" name="tanggal" value="<?= old('tanggal', $transaksi['tanggal'] ?? ''); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="nama_merk" class="col-sm-2 col-form-label">Merk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('nama_merk')) ? 'is-invalid' : ''; ?>" name="nama_merk" value="<?= old('nama_merk', $transaksi['nama_merk'] ?? ''); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_merk'); ?>
                </div>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="transaksi" class="col-sm-2 col-form-label">Transaksi</label>
            <div class="col-sm-10">
                <input class="form-control <?= ($validation->hasError('transaksi')) ? 'is-invalid' : ''; ?>" name="transaksi" value="<?= old('transaksi', $transaksi['transaksi'] ?? ''); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('transaksi'); ?>
                </div>
            </div>
        </div>

        <input type="submit" name="tambah_data" value="Tambah Data" class="btn btn-primary">
        <a href="/user3" class="btn btn-danger">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>