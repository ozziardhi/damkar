<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";
include "../../../config/fungsi_thumb.php";
$module=$_GET['module'];
$act=$_GET['act'];


if ($module=='cabang' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM cabang WHERE id_cabang='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}


if ($module=='cabang' AND $act=='input'){
	mysqli_query($koneksi, "INSERT INTO cabang(
											kd_cabang,
											nama_cabang,
											latitude,
											longitude,
											alamat) 
					VALUES ('$_POST[kd_cabang]',
							'$_POST[nama_cabang]',
							'$_POST[latitude]',
							'$_POST[longitude]',
							'$_POST[alamat]')");							
	header('location:../../media.php?module='.$module);
}


elseif ($module=='cabang' AND $act=='update'){
		mysqli_query($koneksi, "UPDATE cabang SET 
													kd_cabang='$_POST[kd_cabang]',
													nama_cabang='$_POST[nama_cabang]',
													latitude='$_POST[latitude]',
													longitude='$_POST[longitude]',
													alamat='$_POST[alamat]'
													WHERE id_cabang = '$_POST[id]' ");
		header('location:../../media.php?module='.$module);
	}
}
?>
