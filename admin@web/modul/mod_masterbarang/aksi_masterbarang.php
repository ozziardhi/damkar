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


if ($module=='masterbarang' AND $act=='hapus'){
  mysqli_query($koneksi, "DELETE FROM master_barang WHERE id_masterbarang='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}


if ($module=='masterbarang' AND $act=='input'){
	$lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
  if (!empty($lokasi_file)){
    UploadImage1($nama_file);
	mysqli_query($koneksi, "INSERT INTO master_barang(
											kd_aset,
											nama_aset,
											id_kategoriaset,
											satuan,
											tahun_beli,
											harga_beli,
											tahun_jual,
											harga_jual,
											foto) 
					VALUES ('$_POST[kd_aset]',
							'$_POST[nama_aset]',
							'$_POST[id_kategoriaset]',
							'$_POST[satuan]',
							'$_POST[tahun_beli]',
							'$_POST[harga_beli]',
							'$_POST[tahun_jual]',
							'$_POST[harga_jual]',
							'$nama_file')");}						
	header('location:../../media.php?module='.$module);
}


elseif ($module=='masterbarang' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file   = $_FILES['fupload']['name'];
   UploadImage1($nama_file);
		mysqli_query($koneksi, "UPDATE master_barang SET 
													kd_aset='$_POST[kd_aset]',
													nama_aset='$_POST[nama_aset]',
													id_kategoriaset='$_POST[id_kategoriaset]',
													satuan='$_POST[satuan]',
													tahun_beli='$_POST[tahun_beli]',
													harga_beli='$_POST[harga_beli]',
													tahun_jual='$_POST[tahun_jual]',
													harga_jual='$_POST[harga_jual]',
													foto = '$nama_file'
													WHERE id_masterbarang = '$_POST[id]' ");
		header('location:../../media.php?module='.$module);
	}
}
?>
