<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid " style="margin-top:10vh;" >

                <!-- Page Heading -->
                

               
                <div class="container-fluid flex-column" style="display: flex; justify-content: center; align-items: center;padding:20px;background:white;border:2px solid #4e73df;border-radius:15px;">
                
                    <div class="d-sm-flex align-items-center justify-content-between">
                    <h1 class="h3 mb-0 text-gray-800">Tambah Jenis Barang</h1>
                </div>
                    <form action="<?= base_url('/barang/store') ?>" method="POST" style="padding:50px;border-radius:20px;backgorund:white;">
                        <!-- <label>Nama Barang:</label>
        <input type="text" name="nama_barang" id="nama_barang" required> -->

                    
        <div class="mb-3" style="width:850px;">
                            <label for="exampleInputEmail1" class="form-label">Jenis</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jumlah_unit" id="jumlah_unit">
                        </div>
                        <div class="mb-3" style="width:850px;">
                            <label for="exampleInputEmail1" class="form-label">Merk</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jumlah_unit" id="jumlah_unit">
                        </div>
                        
                        <div class="mb-3" style="width:850px;">
                            <label for="exampleInputEmail1" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="jumlah_unit" id="jumlah_unit">
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                        </div>
                    </form>
                </div>

                 
</body>

</html>