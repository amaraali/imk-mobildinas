<?php 

require 'config/db.php';

function query ($query){
	global $conn;
	$result = mysqli_query ($conn, $query);
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function exec_query($query){
	global $conn;
	$result = mysqli_query ($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambah ($data){
	global $conn;

	$username = strtolower ( stripslashes ($data["username"]) );
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama = $data["nama"];
	$level = $data["level"];
	$email = $data["email"];
	$phone = $data["phone"];

	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Username yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2){
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password', '$nama', '$level', '$email', '$phone')");

	return mysqli_affected_rows($conn);
}


function ubah ($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	$level = htmlspecialchars($data["level"]);
	$email = htmlspecialchars($data["email"]);
	$phone = htmlspecialchars($data["phone"]);

	// query insert data
	$query = "UPDATE users SET
				nama ='$nama',
				username = '$username',
				level = '$level',
				email = '$email',
				phone = '$phone'
			WHERE id = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}



function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM users WHERE id=$id");
	return mysqli_affected_rows($conn);
}



function registrasi($data){

	global $conn;

	$username = strtolower ( stripslashes ($data["username"]) );
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$nama = $data["nama"];
	$level = $data["level"];
	$email = $data["email"];
	$phone = $data["phone"];

	// cek username sudah ada belum
	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo "<script>
					alert('Username yang dipilih sudah terdaftar!')
				</script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2){
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambah data ke data base
	mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password', '$nama', '$level', '$email', '$phone')");

	return mysqli_affected_rows($conn);

}

function input_peminjaman($data){

	global $conn;

	$supir = $data["nama"];
	$keperluan = $data["keperluan"];
	$id_jenis_keperluan = $data["jenis_keperluan"];
	$waktu_pinjam = (new DateTime($data["waktu_pinjam"]))->format('Y-m-d H:i:s');
	$waktu_kembali = (new DateTime($data["waktu_kembali"]))->format('Y-m-d H:i:s');
	$id_user = $_SESSION['id_user'];
	$created_at = date('Y-m-d H:i:s');

	
	mysqli_query($conn, "INSERT INTO peminjaman VALUES ('', '$id_user', '$id_jenis_keperluan', '$supir', '', '', '$waktu_pinjam', '$waktu_kembali', '$keperluan', '$created_at', NULL, NULL, NULL)");

	return mysqli_affected_rows($conn);

}

function dd($arr)
{
	echo '<pre>';
	print_r($arr);
	die;
}


function cek_level($yg_boleh){
	$level_dia = $_SESSION['level'];
	if(!in_array($level_dia, $yg_boleh)){
		die("Anda tidak memiliki akses!");
		header("Location: pages/home.php");
	}
}


function get_jenis()
{
	global $conn;
	$result = mysqli_query($conn, "SELECT * FROM jenis_keperluan");

	return $result;
}



function setuju($id){
	global $conn;


	$level = $_SESSION['level'];

	    if($level == 'dir'){
	    	mysqli_query($conn, "UPDATE `peminjaman` SET `is_approve_dir` = 1 WHERE `id` =$id") ;
	    } elseif ($level == 'tu') {
	    	mysqli_query($conn, "UPDATE `peminjaman` SET `is_approve_tu` = 1 WHERE `id` =$id") ;
	    } elseif ($level == 'rt') {
	    	mysqli_query($conn, "UPDATE `peminjaman` SET `is_approve_rt` = 1 WHERE `id` =$id") ;
	    }

	    return true;
}

function tolak($id){
	global $conn;
	

	$level = $_SESSION['level'];

	    if($level == 'dir'){
	    	mysqli_query($conn, "UPDATE `peminjaman` SET `is_approve_dir` = 0 WHERE `id` =$id") ;
	    } elseif ($level == 'tu') {
	    	mysqli_query($conn, "UPDATE `peminjaman` SET `is_approve_tu` = 0 WHERE `id` =$id") ;
	    } elseif ($level == 'rt') {
	    	mysqli_query($conn, "UPDATE `peminjaman` SET `is_approve_rt` = 0 WHERE `id` =$id") ;
	    }

	    return true;
}

function tulis_alert($type, $kalimat){
	return '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
			  '.$kalimat.'
			</div>';
}




?>