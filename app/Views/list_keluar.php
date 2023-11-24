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
<div class=" container">
    <figure>
        <h1>Data Penjualan</h1>
        <blockquote class="blockquote">
            <p>Data Penjualan yang ada didalam database</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
        </figcaption>
    </figure>
    
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    
    <form action="<?= base_url('/create/keluar') ?>" method="get">
        <button type="submit" class="btn btn-primary">Tambah Penjualan</button>
    </form>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Penjualan</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Jumlah Terjual</th>
                    <th class="d-flex content-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jenis as $keluar) : ?>
                    <tr>
                        <td><?= $keluar['id'] ?></td>
                        <td><?= $keluar['tanggalk'] ?></td>
                        <td><?= $keluar['nama_jenis'] ?></td>
                        <td><?= $keluar['nama_merk'] ?></td>
                        <td><?= $keluar['keluar'] ?></td>
                        <td class="d-flex justify-content">
                            <a href="<?= base_url('/keluar/edit/' . $keluar['id']) ?>" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
                            <form action="<?= base_url('/keluar/' . $keluar['id']) ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger" value="Delete" style="width: 80px; height: 40px; padding: 5px;">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
