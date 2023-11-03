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
    <div class="container-fluid" style="display: flex; justify-content: center; align-items: center;">
        <br>
        <form action="<?= base_url('/penjualan/store') ?>" method="POST">
            <!-- <label>Nama Barang:</label>
        <input type="text" name="nama_barang" id="nama_barang" required> -->

            <div class="input-group mb-3" style="width:850px; border: 3px solid #00A9FF; border-radius: 5%;">
                <span class="input-group-text" id="inputGroup-sizing-default">Jenis Barang</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jenis_barang" id="jenis_barang">
            </div>

            <div class="input-group mb-3" style="width:850px; border: 3px solid #00A9FF; border-radius: 5%;">
                <span class="input-group-text" id="inputGroup-sizing-default">Merk Barang</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="merk_barang" id="merk_barang">
            </div>

            <div class="input-group mb-3" style="width:850px; border: 3px solid #00A9FF; border-radius: 5%;">
                <span class="input-group-text" id="inputGroup-sizing-default">Jumlah Terjual</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="jumlah_terjual" id="jumlah_terjual" inputmode="numeric">
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>