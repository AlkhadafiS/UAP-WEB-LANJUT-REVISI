<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- judul -->
<div class="container">
  <figure>
    <h1>Data User</h1>
    <blockquote class="blockquote">
      <p>Data User yang ada didalam database</p>
    </blockquote>
    <figcaption class="blockquote-footer">
      CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
    </figcaption>
  </figure>
  <!-- <a href="/user1/create" type="button" class="btn btn-primary">Tambah Data</a> -->
  <div class="table-responsive"><br>
    <table class="table align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>User</th>
          <th>Password</th>
          <th>jabatan</th>
          <th class="d-flex content-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($users as $user) {
        ?>
          <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nama_user'] ?></td>
            <td><?= $user['password'] ?></td>
            <td><?= $user['nama_jabatan'] ?></td>
            <td class="d-flex justify-content">
              <a href="<?= base_url('/user1/' . $user['id'] . '/edit') ?>" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
              <form action="<?= base_url('user1/' . $user['id']) ?>" method="POST">
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