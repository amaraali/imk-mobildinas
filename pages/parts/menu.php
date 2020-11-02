   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="img/mcs.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    MCS
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <?php 
      $level = $_SESSION['level'];
      $uri = $_SERVER['REQUEST_URI'];
      
      if($level == 'admin'): ?>
       <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= (strpos($uri, 'home.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item <?= (strpos($uri, 'form.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="form.php">Formulir Peminjaman</a>
          </li>
          <li class="nav-item <?= (strpos($uri, 'daftar_peminjaman.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="daftar_peminjaman.php">Daftar Peminjaman</a>            
          </li>
          <li class="nav-item <?= (strpos($uri, 'manajemen_pengguna.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="manajemen_pengguna.php">Manajemen Pengguna</a>            
          </li>
          <li class="nav-item <?= (strpos($uri, 'konfigurasi.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="konfigurasi.php">Konfigurasi</a>            
          </li>
      </ul>
      <?php elseif (in_array($level, array('dir','tu','rt'))) :?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= (strpos($uri, 'home.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a> 
          </li>
          <li class="nav-item <?= (strpos($uri, 'persetujuan.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="persetujuan.php">Persutujuan</a>           
          </li>
        </ul>
      <?php elseif ($level == 'supir') :?>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= (strpos($uri, 'home.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?= (strpos($uri, 'form.php') !== false)?'active':'' ?>">
            <a class="nav-link" href="form.php">Formulir Peminjaman</a>
          </li>
          <li class="nav-item <?= (strpos($uri, 'daftar_peminjaman.php') !== false)?'active':'' ?>">  
            <a class="nav-link" href="daftar_peminjaman.php">Daftar Peminjaman Saya</a>
          </li>
        </ul>
      <?php endif; ?>
        <ul class="navbar-nav ">
          <li class="nav-item">
            <div class=" nav-link text-white"><?php echo $_SESSION["nama"];?></div>
          </li>
          <li class="nav-item">
            <div><a class="nav-link text-white" href="../logout.php">Logout</a></div>
          </li>
        </ul>
    </div>
  </nav>