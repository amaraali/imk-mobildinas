  <?php require 'parts/header.php'; ?>
  <?php 
  if(!isset($_SESSION["login"])){
  header ("Location: ../login.php");
  exit;
  }

  $jk = get_jenis();

  if(isset($_POST["submit"])) {
    if(input_peminjaman($_POST) > 0){
        echo "<script>
                alert('Data berhasil dikirim!');
        </script>";

    } else {
        echo mysqli_error($conn);
    } 
    
  } 


?>
 
 <?php require 'parts/menu.php'; ?>

  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="130" height="130">
      <h2>Formulir Peminjaman Kendaraan Dinas</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 mx-auto">
        <form class="needs-validation" method="post" action="" novalidate>
            <input type="hidden" class="form-control" id="nama" name="nama" value='<?php echo $_SESSION["nama"];?>'>
            <div class="mb-3">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" placeholder="Nama" required name="nama" value='<?php echo $_SESSION["nama"];?>' disabled>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

            <div class="row">
              <div class="col-md-8 mb-3">
              <label for="keperluan">Keperluan</label>
              <textarea class="form-control" id="keperluan" placeholder="Keperluan" required name="keperluan"></textarea>
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Jenis Keperluan</label>
                  <select class="custom-select d-block w-100" id="state" required name="jenis_keperluan">
                    <option value="">--Pilih--</option>
                    <?php foreach ($jk as $key => $value) :?>
                      <option value="<?= $value['id'] ?>"><?= $value['jenis_keperluan'] ?></option>
                    <?php endforeach; ?>
                    
                  </select>
                <div class="invalid-feedback">
                  Kolom ini tidak boleh kososng.
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-5 mb-3">
                Tanggal Keberangkatan : <input id="startDate" width="276" name="waktu_pinjam" autocomplete="off" />
              </div>
              <div class="col-md-5 mb-3">
                Tanggal Kembali : <input id="endDate" width="276" name="waktu_kembali" autocomplete="off" />
              </div>
              <script>
                var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                $('#startDate').datetimepicker({
                    uiLibrary: 'bootstrap4',
                    iconsLibrary: 'fontawesome',
                    minDate: today,
                    maxDateTime: function () {
                        return $('#endDate').val();
                    }
                });
                $('#endDate').datetimepicker({
                    uiLibrary: 'bootstrap4',
                    iconsLibrary: 'fontawesome',
                    minDateTime: 'today'
                    
                });
              </script>
            </div>           
          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Kirim</button>
        </form>
      </div>
    </div>

    <?php  require 'parts/footer.php' ?>

