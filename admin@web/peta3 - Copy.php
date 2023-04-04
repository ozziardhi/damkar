<?php
//include "header.php";
?>

<!DOCTYPE html>
<html>
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../config/koneksi.php";	

	?>
	<link href='style.css' rel='stylesheet' type='text/css'>
<head>
	<title>Peta Damkar Kota Bekasi</title>
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<script src="leaflet/leaflet.js"></script>
	<script type=”text/javascript”>

    function stopRKey(evt) {
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type==”text”))  {return false;}
    }

    document.onkeypress = stopRKey;

    </script>
<style type="text/css">
	#mapid {
		margin: 0 auto 0 auto;
		height: 99%;
		width: 99%;
	}
	html, body {
        height: 100%;
      }
</style>

</head>
<body>
	<?php

//pemanggilan database
if (!isset($_GET['act'])) {
      echo "
      <h2>Daftar Aset</h2>
			<form method=POST action='?module=peta3&act=cari'>
			<table id='example1' class='table table-bordered table-striped'>
				
				<div class='control-group'>
					<label class='control-label'>Kategori Asset</label>
					<div class='controls'>
						<select class='form-control' name='cari'>
							<option value=''>--- Pilih Kategori Asset ---</option>";
							$tampil1=mysqli_query($koneksi,"SELECT * FROM kategoriaset ORDER BY id_kategoriaset DESC");
							while($data_kategori=mysqli_fetch_array($tampil1)){
							echo "<option value='$data_kategori[id_kategoriaset]'>$data_kategori[nama_kategoriaset]</option>";
							}
							echo "										
						</select>
					</div>
				</div>
				<tr>
					<td>&nbsp</td><td>
						<input type=submit value=Search>
						<input type=button value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table>
			</form>"; ?>
<div id="mapid" ></div>
<script type="text/javascript">
		var mapOptions = {
		   center: [-6.223238, 107.009236], 
		   zoom: 13
		}
		var map = new L.map('mapid', mapOptions);
		var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
		map.addLayer(layer);
  <?php
  require ('../config/koneksi.php');
  $js='';
	$markernya='';
	//$data = mysqli_query($koneksi, 'SELECT DISTINCT email_user FROM pengaduan');
  $data = mysqli_query($koneksi,"SELECT * from aset");
  while ($row = mysqli_fetch_assoc($data)) {
		$data2 = mysqli_query($koneksi, "SELECT * from cabang WHERE id_cabang='$row[id_cabang]' ");
		$row2 = mysqli_fetch_assoc($data2);
		//var marker = L.marker([-6.238168, 106.991664]).addTo(map);
		 //$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b>'.$row['keterangan'].'</b>");';
		 		$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b></b></br>'.$row2['alamat'].'</br></br>.");';
	}
	echo "$js";
}else {
	switch($_GET['act']){
    case "cari":
			
			echo "
		
      <h2>Daftar Aset</h2>
			<form method=POST action='?module=peta3&act=cari'>
			<table id='example1' class='table table-bordered table-striped'>
				
				<div class='control-group'>
					<label class='control-label'>Kategori Asset</label>
					<div class='controls'>
						<select class='form-control' name='cari'>
							<option value=''>--- Pilih Kategori Asset ---</option>";
							$tampil1=mysqli_query($koneksi,"SELECT * FROM kategoriaset ORDER BY id_kategoriaset DESC");
							while($data_kategori=mysqli_fetch_array($tampil1)){
							echo "<option value='$data_kategori[id_kategoriaset]'>$data_kategori[nama_kategoriaset]</option>";
							}
							echo "										
						</select>
					</div>
				</div>
				<tr>
					<td>&nbsp</td><td>
						<input type=submit value=Search>
						<input type=button value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table>
			</form>";
		echo"
		<div id='mapid' ></div>
		<script type='text/javascript'>";?>
		var mapOptions = {
		   center: [-6.223238, 107.009236], 
		   zoom: 13
		}
		var map = new L.map('mapid', mapOptions);
		var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
		map.addLayer(layer)
  <?php 
  require ('../config/koneksi.php');
  $js='';
	$markernya='';
	$cari= $_POST['cari'];
	//$data = mysqli_query($koneksi, 'SELECT DISTINCT email_user FROM pengaduan');
  $data = mysqli_query($koneksi,"SELECT * from aset WHERE id_kategoriaset = '$cari'");
  while ($row = mysqli_fetch_assoc($data)) {
		$data2 = mysqli_query($koneksi, "SELECT * from cabang WHERE id_cabang='$row[id_cabang]' ");
		$row2 = mysqli_fetch_assoc($data2);
		//var marker = L.marker([-6.238168, 106.991664]).addTo(map);
		 //$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b>'.$row['keterangan'].'</b>");';
		 		$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b></b></br>'.$row2['alamat'].'</br></br>.");';
		 		
	}
	echo "$js";

		}

	}

}

	?>	

	</script>
</body>
</html>
