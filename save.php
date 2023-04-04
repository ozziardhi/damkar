<?php
//if($_SERVER['REQUEST_METHOD']=='POST'){
include "koneksi.php";

$lat  =$_POST['latitude'];
$long =$_POST['longitude'];
$lok  =$_POST['location'];
$email  =$_POST['email'];
$kejadian  =$_POST['kejadian'];
$status=$_POST['status'];
//$kodemenara  =$_POST['kodemenara'];
$query=mysqli_query($koneksi,"INSERT INTO pengaduan (tanggal, latitude, longitude, keterangan, email_user, kejadian, status) 
VALUES (sysdate(),'$lat', '$long', '$lok', '$email', '$kejadian', '$status')");
if($query){
	 echo json_encode("Berhasil Disimpan");
	}else{
	 echo json_encode("Gagal Disimpan");
	}

 //   }
?>