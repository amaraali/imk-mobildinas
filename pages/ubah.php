<?php require 'parts/header.php'; ?>
<?php 

if(!isset($_SESSION["login"])){
	header ("Location: login.php");
	exit;
}

// ambil data di URL
$id = $_GET["id"];

// query data berdasarkan id
$usr = query("SELECT * FROM users WHERE id = $id")[0];


// cek tombol submit
if(isset($_POST["submit"]) ){

	if(ubah($_POST)>0){
		echo "
			<script>
				alert('Data berhasil diubah!');
				document.location.href = 'manajemen_pengguna.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal diubah!');
				document.location.href = 'manajemen_pengguna.php'
			</script>
		";
	}

}

?>

<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="img/mcs.png" alt="" width="130" height="130">
      <h2>Manajemen Pengguna</h2>
      <p class="lead">PT. Mencari Cinta Sejati</p>
    </div>
  </div>

  <div class="container">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-10 mx-auto">
        <form class="needs-validation" method="post" action="" novalidate>
        	<input type="hidden" name="id" value="<?php echo $usr["id"]; ?>">
            <div class="mb-3">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama"  required value="<?php echo $usr["nama"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>
             <div class="mb-3">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username"  required value="<?php echo $usr["username"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>
            <div class="mb-3">
              <label for="level">Jabatan</label>
              <select class="custom-select d-block w-100" id="level" name="level">
                <option value="admin" <?php if($usr["level"]=="admin") echo "selected"?> >Admin</option>
      			    <option value="dir" <?php if($usr["level"]=="dir") echo "selected"?> >Direktur Utama</option>
           		  <option value="tu" <?php if($usr["level"]=="tu") echo "selected"?> >Kepala TU</option>
        		    <option value="rt" <?php if($usr["level"]=="rt") echo "selected"?> >Kepala Rumah Tangga</option>
                <option value="supir" <?php if($usr["level"]=="supir") echo "selected"?> >Supir</option>
              </select>
            </div>
             <div class="mb-3">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email"  required value="<?php echo $usr["email"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>
             <div class="mb-3">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone"  required value="<?php echo $usr["phone"]; ?>">
              <div class="invalid-feedback">
                Kolom ini tidak boleh kososng.
              </div>
            </div>

          <hr class="mb-4">
          <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Ubah Data</button>
        </form>
      </div>
    </div>

<?php  require 'parts/footer.php' ?>