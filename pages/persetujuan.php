 <?php require 'parts/header.php'; ?>
 <?php 
  if(!isset($_SESSION["login"])){
  header ("Location: ../login.php");
  exit;
  }
 ?>
 <?php cek_level(["admin", "dir", "tu", "rt"]); ?>
 <?php require 'parts/menu.php'; ?>

  <?php
   $peminjaman = query("SELECT * FROM peminjaman");
   $level = $_SESSION['level'];
   ?>



  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="130" height="130">
      <h2>Permohonan Peminjaman</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
    <div class="col-lg-10 col-md-10 col-sm-10 mx-auto">
      <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Peminjam</th>
            <th scope="col">Waktu</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Persetujuan</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach ($peminjaman as $row) :?>
          <tr>
            <td><?php echo $i;  ?></td>
            <td><?php echo $row["supir"];  ?></td>
            <td><?php echo $row["waktu_pinjam"]; ?></td>
            <td><?php echo $row["keperluan"];  ?></td>
            <td>
              <?php if($row["is_approve_".$level] == '0'){
                echo '<span class="badge badge-danger">Ditolak</span>';
                } else if ($row["is_approve_".$level] == '1'){
                echo '<span class="badge badge-success">Disetujui</span>';
                } else{ ?>
                    <a class="btn btn-success" href="setuju.php?id=<?= $row["id"]; ?>">Setujui</a> 
                    <a class="btn btn-danger" href="tolak.php?id=<?php echo $row["id"]; ?>" >Tolak</a>
                <?php }?>
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