<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/library.php";
include "../../../config/fungsi_thumb.php";
$module=$_GET['module'];
$act=$_GET[act];


if ($module=='users' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM users WHERE id_users='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}


if ($module=='users' AND $act=='input'){
$lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  $pass=md5($_POST[password]);
  if (!empty($lokasi_file)){
    UploadImage($nama_file);
	mysqli_query($koneksi, "INSERT INTO users(
											username,
											password,
											nama_lengkap,
											email, 
											no_telp,
											level,
											blokir,
											foto_user,
											id_session) 
					VALUES ('$_POST[username]',
									'$pass',
									'$_POST[nama_lengkap]',					
									'$_POST[email]',	
									'$_POST[no_telp]',
									'$_POST[level]',
									'$_POST[blokir]',
									'$nama_file',
									'$pass')");							
	header('location:../../media.php?module='.$module);
}
}


elseif ($module=='users' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
   $pass=md5($_POST['password']);
   UploadImage($nama_file);
		mysqli_query($koneksi, "UPDATE users SET 
													username='$_POST[username]',
													password='$pass',
													nama_lengkap='$_POST[nama_lengkap]',
													email='$_POST[email]',
													no_telp='$_POST[no_telp]',
													level='$_POST[level]',
													
													blokir='$_POST[blokir]',
													foto_user = '$nama_file'
													
													WHERE id_users = '$_POST[id]'");
		header('location:../../media.php?module='.$module);
	}
}
/*elseif ($module=='users' AND $act=='update'){
	 $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
   $pass=md5($_POST['password']);
   
  if ((empty($_POST[password]))AND(empty($lokasi_file))){  		
    mysqli_query($koneksi,"UPDATE users SET 
    							  nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'                                    
                           WHERE  id_session     = '$_POST[id]'");
header('location:../../media.php?module='.$module);
  }
  // Apabila password diubah
 elseif ((!empty($_POST[password]))AND(!empty($lokasi_file))){
    $pass=md5($_POST[password]);
 UploadImage($nama_file);
    mysqli_query($koneksi,"UPDATE users SET  username = '$_POST[username]', password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]',
                                 foto_user         = '$nama_file'
                           WHERE id_session      = '$_POST[id]'");
header('location:../../media.php?module='.$module);
  }
 elseif ((!empty($_POST[password]))AND(empty($lokasi_file))){
 	 $pass=md5($_POST[password]);
    mysqli_query($koneksi,"UPDATE users SET  username = '$_POST[username]', password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',
                                 no_telp         = '$_POST[no_telp]' 
                           WHERE id_session      = '$_POST[id]'");
 header('location:../../media.php?module='.$module);
}
elseif ((empty($_POST[password]))AND(!empty($lokasi_file))){
  UploadImage($nama_file);
    mysqli_query($koneksi,"UPDATE users SET nama_lengkap = '$_POST[nama_lengkap]',
                                 email = '$_POST[email]',  
                                 blokir = '$_POST[blokir]',  
                                 no_telp = '$_POST[no_telp]',
                                 foto_user = '$nama_file' 
                                 WHERE id_session = '$_POST[id]'");
header('location:../../media.php?module='.$module);
}
                           
}
}*/

?>
