
 <?php 
 require 'parts/header.php';

 if(!isset($_SESSION["login"])){
  header ("Location: ../login.php");
  exit;
 }


 require 'parts/menu.php'; 

 $alert = false;
 

 if(isset($_POST['submit'])){
    if($_POST['aksi'] == 'edit'){
      $ar = exec_query("UPDATE jenis_keperluan SET jenis_keperluan='".$_POST['jenis_keperluan']."' where id=$_POST[id_jenis_keperluan]");
      if($ar > 0){
          $alert = tulis_alert('success', 'Data jenis keperluan berhasil diubah.');
      }else{
        $alert = tulis_alert('danger', 'Data jenis keperluan gagal diubah.');
      }
    }else{
      $ar = exec_query("INSERT INTO jenis_keperluan (`jenis_keperluan`) VALUES ('".$_POST['jenis_keperluan']."')");
      if($ar > 0){
          $alert = tulis_alert('success', 'Berhasil input data jenis keperluan.');
      }else {
        $alert = tulis_alert('danger', 'Gagal input data jenis keperluan.');
      }
    }
 }

 if(isset($_GET['hapus_id'])){
  $id = $_GET["hapus_id"];
  $ar = exec_query("DELETE FROM jenis_keperluan WHERE id=$id");
  if($ar > 0){
    $alert = tulis_alert('success', 'Data jenis keperluan berhasil dihapus.');
  }else{
    $alert = tulis_alert('danger', 'Data jenis keperluan gagal dihapus.');
  }
 }

 $jenis_keperluan = query("SELECT * FROM jenis_keperluan");
 

 ?>



  <div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="130" height="130">
      <h2>Konfigurasi</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
    <div class="col-lg-10 col-md-10 col-sm-10 mx-auto">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
          Tambah Data
        </button>

      <?php if($alert !== false) echo $alert ?>
      <hr class="mb-4">
      <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Jenis Kepentingan</th>
            <th scope="col">Menu</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          <?php foreach ($jenis_keperluan as $row) :?>
          <tr>
            <td><?php echo $i;  ?></td>
            <td>

            <div id="row_jenis_keperluan">
              <?php echo $row["jenis_keperluan"]; ?>
            </div>

              <form action="#" method="POST" style="display: none" id="form_edit">
                <input type="hidden" name="aksi" value="edit">
                <input type="hidden" name="id_jenis_keperluan" value="<?= $row['id'] ?>">
                <div class="form-inline">
                <input type="text" name="jenis_keperluan" value="<?= $row['jenis_keperluan'] ?>" class="form-control form-control-sm">
                <button type="submit" class="btn btn-sm btn-primary ml-3" name="submit" >Simpan</button>
                </div>
              </form>
              
            </td>
            <td>
              <button class="btn btn-success btn-sm" onclick="hey(this)">Ubah</button>
        <a class="btn btn-danger btn-sm" href="?hapus_id=<?php echo $row["id"]; ?>" onclick="return confirm('Klik Ok untuk menghapus');">Hapus</a>
            </td>
          </tr>
          <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Keperluan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="#" method="POST" >
            <input type="hidden" name="aksi" value="tambah">
            <div class="form-group">
              <input type="text" name="jenis_keperluan" placeholder="Masukkan jenis keperluan" class="form-control">
              <button type="submit" class="btn btn-primary mt-2 pull-right" name="submit" >Simpan</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>

    function hey(obj){
      $(obj).closest('tr').find('#form_edit').toggle();
      $(obj).closest('tr').find('#row_jenis_keperluan').toggle();
    }
</script>
<?php  require 'parts/footer.php' ?>