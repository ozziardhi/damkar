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
$act=$_GET['act'];


if ($module=='aset' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM aset WHERE id_aset='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}


if ($module=='aset' AND $act=='input'){
	$lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  if (!empty($lokasi_file)){
    UploadImage1($nama_file);
	mysqli_query($koneksi, "INSERT INTO aset(
											kd_aset,
											serial_number,
											nama_aset,
											id_kategoriaset,
											id_cabang,
											satuan,
											harga_beli,
											tgl_masuk,
											latitude,
											longitude,
											kondisi,
											foto,
											id_departement) 
					VALUES ('$_POST[kd_aset]',
							'$_POST[serial_number]',
							'$_POST[nama_aset]',
							'$_POST[id_kategoriaset]',
							'$_POST[id_cabang]',
							'$_POST[satuan]',
							'$_POST[harga_beli]',
							'$_POST[tgl_masuk]',
							'$_POST[latitude]',
							'$_POST[longitude]',
							'$_POST[kondisi]',
							'$nama_file',
							'$_POST[id_departement]')");}						
	header('location:../../media.php?module='.$module);
}


elseif ($module=='aset' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
   UploadImage1($nama_file);
		mysqli_query($koneksi, "UPDATE aset SET 
													kd_aset='$_POST[kd_aset]',
													serial_number='$_POST[serial_number]',
													nama_aset='$_POST[nama_aset]',
													id_kategoriaset='$_POST[id_kategoriaset]',
													id_cabang='$_POST[id_cabang]',
													satuan='$_POST[satuan]',
													harga_beli='$_POST[harga_beli]',
													tgl_masuk='$_POST[tgl_masuk]',
													latitude='$_POST[latitude]',
													longitude='$_POST[longitude]',
													kondisi='$_POST[kondisi]',
													id_departement='$_POST[id_departement]',
													foto = '$nama_file'
													WHERE id_aset = '$_POST[id]' ");
		header('location:../../media.php?module='.$module);
	}
}
?>
