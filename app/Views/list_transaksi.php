<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<nav class="navbar bg-body-tertiary">
    <!-- navbar -->
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            UAP Web lanjut
        </a>

        <a class="navbar-brand" href="<?= base_url('/user3') ?>">
        Barang
        </a>

        <a class="navbar-brand" href="<?= base_url('/transaksi') ?>">
        Transaksi
        </a>
    </div>
</nav><br>

<!-- judul -->
<div class=" container">
    <figure>
        <h1>Data Transaksi</h1>
        <blockquote class="blockquote">
            <p>Data Transaksi yang ada didalam database</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
        </figcaption>
    </figure>
    <form action="<?= base_url('/create/transaksi') ?>" method="get">
        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
    </form>

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Masuk Barang</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Transaksi</th>
                    <th class="d-flex content-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jenis as $transaksi_item) : ?>
                    <tr>
                        <td><?= $transaksi_item['id'] ?></td>
                        <td><?= $transaksi_item['tanggal'] ?></td>
                        <td><?= $transaksi_item['nama_jenis'] ?></td>
                        <td><?= $transaksi_item['nama_merk'] ?></td>
                        <td><?= $transaksi_item['transaksi'] ?></td>
                        <td class="d-flex justify-content">
                        <a href="<?= base_url('transaksi/edit/' . $transaksi_item['id']) ?>" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
                            <form action="<?= base_url('transaksi/' . $transaksi_item['id']) ?>" method="POST">
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