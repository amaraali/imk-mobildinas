
 <?php 
 require 'parts/header.php';

 if(!isset($_SESSION["login"])){
  header ("Location: ../login.php");
  exit;
 }
 // require '../functions.php';
 cek_level(["admin"]); 
 require 'parts/menu.php';
 cek_level(["admin", "supir"]); 


 $users = query("SELECT * FROM users");
 

 ?>



  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="130" height="130">
      <h2>Manajemen Pengguna</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
    <div class="col-lg-10 col-md-10 col-sm-10 mx-auto">
      <a class="btn btn-primary" href="tambah.php">Tambah data</a>
      <hr class="mb-4">
      <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Menu</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach ($users as $row) :?>
          <tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $row["nama"]; ?></td>
            <td><?php echo $row["username"];  ?></td>
            <td>
              <?php 
                $level = $row["level"]; 
                if($level == 'dir'){
                  echo "Direktur Utama";
                }elseif ($level == 'rt') {
                  echo "Kepala RT";
                }elseif ($level == 'tu') {
                  echo "Kepala TU";
                }elseif ($level == 'admin') {
                  echo "Admin";
                } else {
                  echo "Supir";
                }

              ?>
                
            </td>
            <td><?php echo $row["email"];  ?></td>
            <td><?php echo $row["phone"];  ?></td>
            <td>
            	<a class="btn btn-success btn-sm" href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
				<a class="btn btn-danger btn-sm" href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Klik Ok untuk menghapus');">Hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
  	  </div>
    </div>
  </div>

<?php  require 'parts/footer.php' ?>