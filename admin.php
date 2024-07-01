<?php include "header.php"; ?>

<?php
if(isset($_POST['bsimpan'])){
    $tgl = date('Y-m-d');

    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['telphone'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('', '$tgl', '$nama', '$alamat', '$nope')");
    
    if ($simpan) {
        echo "<script>alert('Simpan data Sukses');
        document.location='?'</script>";
    } else {echo "<script>alert('Simpan data Gagal');
        document.location='?'</script>";

    }

}
?>
<div class="head text-center">
        <img src="assets/img/Profil.png">
    <h2 class="text-white">Website Buku Tamu <br> I Kadek Juli Dwipayana</h2>
 </div>

        <div class="row mt-2">
            <div class="col-lg-7 mb-3">
                <div class="card shadow bg-gradient-light">
                    <div class="card body">
                    <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Identitas</h1>
                            </div>
                            <form class="user" nethod="POST" action="">
                                <div class="form-group">
                                    <input type="text"class="form-control form-control-user" 
                                    name="nama" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="text"class="form-control form-control-user" 
                                    name="alamat" placeholder="Alamat"required>
                                </div>
                                <div class="form-group">
                                    <input type="text"class="form-control form-control-user" 
                                    name="nope" placeholder="Telphone"required>
                                </div>


                                <button type="submit" name ="bsimpan "class="btn btn-primary btn-user btn-block">Simpan</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">I Kadek Juli Dwipayana | 2101010072</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 mb-3">
                <div class="card shadow">
                    <div class="card body">
                        <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Statistik</h1>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>Hari ini</td>
                                <td>: 10</td>
                            </tr>
                            <tr>
                                <td>Kemarin</td>
                                <td>: 15</td>
                            </tr>
                            <tr>
                                <td>bulan ini</td>
                                <td>: 30</td>
                            </tr>
                            <tr>
                                <td>keseluruhan</td>
                                <td>: 50</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari ini [<?= date('d-m-Y')?>]</h6>
                </div>
                     <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telphone</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>tanggal</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telphone</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $tgl = date('Y-m-d');
                                            $tampil = mysqli_query($koneksi, "SELECT * FROM ttamu where tanggal like 
                                            '$tgl%' order by id desc");
                                            $no = 1;

                                            while($data = mysqli_fetch_array($tampil)){
                                        ?>
                                         <tr>
                                            <th><?=$no++ ?></th>
                                            <th><?=$data['tanggal'] ?></th>
                                            <th><?=$data['nama'] ?></th>
                                            <th><?=$data['alamat'] ?></th>
                                            <th><?=$data['nope'] ?></th>
                                        </tr>
                                        <?php } ?>
                                        </tbody>
                                    </tbody>
                                </table>
                            </div>
                     </div>
         </div>
<?php include "footer.php"; ?>

