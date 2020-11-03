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
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="200" height="200">
      <h2>Sistem Informasi Peminjaman Kendaraan Dinas</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 mx-auto">
        <div class="jumbotron">
          <h1 class="display-4">Selamat Datang <?php echo $_SESSION["nama"];?>!</h1>
          <p class="lead">Sistem Informasi Peminjaman Kendaraan Dinas</p>
          <hr class="my-4">
          <p>PT. Mencari Cinta Sejati</p>
          <p class="lead">
            <?php 
              $level = $_SESSION['level'];
              if($level == 'supir'): ?>
                <a class="btn btn-primary btn-lg" href="form.php" role="button">Pinjam</a>
              <?php elseif (in_array($level, array('dir','tu','rt'))) :?>
                <a class="btn btn-primary btn-lg" href="persetujuan.php" role="button">Daftar Permohonan</a>
             
              <?php endif; ?>
            
          </p>
        </div>
      </div>
    </div>

    <?php  require 'parts/footer.php' ?>

