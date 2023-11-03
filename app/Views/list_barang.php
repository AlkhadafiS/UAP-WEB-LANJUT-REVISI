<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <br>
    <form action="<?= base_url('/barang/add') ?>" method="get">
        <button type="submit" class="btn btn-primary btn-sm">Tambah Barang</button>
    </form>

    <br>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Merk Barang</th>
                <th scope="col">Jumlah Unit</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Minyak</td>
                <td>Sania</td>
                <td>100</td>
                <td>
                    <form>
                        <button type="button" class="btn btn-outline-primary" disabled>Detail</button>
                    </form>
                </td>
            </tr>

            <tr>
                <th scope="row">2</th>
                <td>Minyak</td>
                <td>Bimoli</td>
                <td>100</td>
                <td>
                    <form>
                        <button type="button" class="btn btn-outline-primary" disabled>Detail</button>
                    </form>
                </td>
            </tr>

            <tr>
                <th scope="row">3</th>
                <td>Sabun</td>
                <td>Rinso</td>
                <td>100</td>
                <td>
                    <form>
                        <button type="button" class="btn btn-outline-primary" disabled>Detail</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>