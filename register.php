<?php
include "koneksi.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
		$username  =$_POST['username'];
		$password =$_POST['password'];
		$nama_lengkap =$_POST['nama_lengkap'];
		$email  =$_POST['email'];
		$no_telp  =$_POST['no_telp'];
		$foto_user  =$_POST['foto_user'];
	if (empty($email)){
		echo json_encode("Data yang diinput belum lengkap");
		return;
	}
	else {
		$query=mysqli_query($koneksi,"INSERT INTO users (username, password, nama_lengkap, email, no_telp, foto_user) VALUES ('$username', '$password', '$nama_lengkap', $email', '$no_telp','$foto_user')");
  }
	if($query){
		 echo json_encode("Berhasil Disimpan");
	}
	else{
		 echo json_encode("Gagal Disimpan");
	}
}
?>