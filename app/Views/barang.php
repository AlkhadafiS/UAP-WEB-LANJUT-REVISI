<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="card text-center">
        <div class="card card-header text-bg-info mb-3">
            DETAIL BARANG
        </div>
        <div class="card-body">
            <h5 class="card-title">Jenis Barang: <?= $jenis_barang ?></h5>
            <h5 class="card-title">Merk Barang: <?= $merk_barang ?></h5>
            <h5 class="card-title">Jumlah Unit: <?= $jumlah_unit ?></h5>
        </div>
        <div class="card card-header text-bg-info mb-3">
            INDOAPRIL INDONESIA
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>