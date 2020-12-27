 <?php require 'parts/header.php'; ?>
 <?php 
  if(!isset($_SESSION["login"])){
  header ("Location: ../login.php");
  exit;
  }
 ?>
 <?php cek_level(["admin", "supir"]); ?>
 <?php require 'parts/menu.php'; ?>

  <?php
   $level = $_SESSION['level'];
    $id_user = $_SESSION["id_user"];
   if($level=="supir"){
     $peminjaman = query("SELECT * FROM peminjaman WHERE id_user=$id_user");
   } else{
     $peminjaman = query("SELECT * FROM peminjaman");
   }
  
  
   ?>


  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="130" height="130">
      <h2>Permohonan Peminjaman</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
    <div class="col-lg-12 col-md-10 col-sm-10 mx-auto">
      <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Peminjam</th>
            <th scope="col">Waktu Pinjam</th>
            <th scope="col">Waktu Kembali</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Kepala RT</th>
            <th scope="col">Kepala TU</th>
            <th scope="col">Direktur Utama</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach ($peminjaman as $row) :?>
          <tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $row["supir"];  ?></td>
            <td><?php echo $row["waktu_pinjam"]; ?></td>
            <td><?php echo $row["waktu_kembali"]; ?></td>
            <td><?php echo $row["keperluan"];  ?></td>
            <td>
              <?php if($row["is_approve_rt"] == '0'){
                echo '<span class="badge badge-danger">Ditolak</span>';
                } else if ($row["is_approve_rt"] == '1'){
                echo '<span class="badge badge-success">Disetujui</span>';
                } else{
                    echo "<i>Menunggu persetujuan</i>";
                }?>
            </td>
            <td>
              <?php if($row["is_approve_tu"] == '0'){
                echo '<span class="badge badge-danger">Ditolak</span>';
                } else if ($row["is_approve_tu"] == '1'){
                echo '<span class="badge badge-success">Disetujui</span>';
                } else{
                    echo "<i>Menunggu persetujuan</i>";
                }?>
            </td>
            <td>
              <?php if($row["is_approve_dir"] == '0'){
                echo '<span class="badge badge-danger">Ditolak</span>';
                } else if ($row["is_approve_dir"] == '1'){
                echo '<span class="badge badge-success">Disetujui</span>';
                } else{
                    echo "<i>Menunggu persetujuan</i>";
                }?>
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