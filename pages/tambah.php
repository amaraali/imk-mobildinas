  <?php require 'parts/header.php'; ?>
  <?php 
  if(!isset($_SESSION["login"])){
  header ("Location: ../login.php");
  exit;
  }

  if(isset($_POST["submit"])) {

    if(tambah($_POST) > 0){
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'manajemen_pengguna.php'
              </script>";

    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'manajemen_pengguna.php'
              </script>";
    } 

}

?>
 

  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="130" height="130">
      <h2>Formulir Peminjaman Kendaraan Dinas</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 mx-auto">
        <a class="btn btn-secondary btn-sm" href="manajemen_pengguna.php">Kembali</a>
        <hr class="mb-4">
        <form class="needs-validation" method="post" action="" novalidate>
            <div class="mb-3">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" name="password" autocomplete="off" required>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="password2">Konfirmasi Password</label>
              <input type="text" class="form-control" id="password2" name="password2" autocomplete="off" required>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>
             
            <div class="mb-3">
              <label for="level">Jabatan</label>
              <select class="custom-select d-block w-100" name="level" id="level">
                <option disabled="disabled" selected="selected">--Pilih--</option>
                <option value="dir">Direktur Utama</option>
                <option value="tu">Kepala TU</option>
                <option value="rt">Kepala RT</option>
                <option value="supir">Supir</option>
              </select>
              <div class="select-dropdown"></div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" autocomplete="off" required>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="mb-3">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" required>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>
             
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Tambah Data</button>
        </form>
      </div>
    </div>
                       
       
<?php  require 'parts/footer.php' ?>
