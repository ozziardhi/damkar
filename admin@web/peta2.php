<?php
//include "header.php";
?>

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
    <script type=”text/javascript”>

    function stopRKey(evt) {
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type==”text”))  {return false;}
    }

    document.onkeypress = stopRKey;

    </script>
</head>		
<?php

//pemanggilan database
if (!isset($_GET['act'])) {
      echo "
      <h2>Daftar Aset</h2>
			<form method=POST action='?module=peta2&act=cari'>
			<table id='example1' class='table table-bordered table-striped'>
				
				<tr> 
					<td valign='top'>Nama Asset</td>
					<td><input name='nama_aset' type='text' size='30'></td>
				</tr>
				<tr>
					<td>&nbsp</td><td>
						<input type=submit value=Search>
						<input type=button value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table>
			</form>"; ?>

     <!DOCTYPE html>
<html>
<head>
	<title>Peta Damkar Kota Bekasi</title>
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<script src="leaflet/leaflet.js"></script>
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
  require ('koneksi.php');
  $js='';
	$markernya='';
	//$data = mysqli_query($koneksi, 'SELECT DISTINCT email_user FROM pengaduan');
  $data = mysqli_query($koneksi,"SELECT * from aset group by nama_aset order by id_aset DESC");
  while ($row = mysqli_fetch_assoc($data)) {
		$data2 = mysqli_query($koneksi, "SELECT * from cabang WHERE id_cabang='$row[id_cabang]' ");
		$row2 = mysqli_fetch_assoc($data2);
		//var marker = L.marker([-6.238168, 106.991664]).addTo(map);
		 //$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b>'.$row['keterangan'].'</b>");';
		 		$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b></b></br>'.$row2['alamat'].'</br></br>.");';
	}
	echo "$js";
	?>	
	</script>
</body>
</html>
<?php  
}
else {
	switch($_GET['act']){
    case "cari":
			
			echo "
		
      <h2>Daftar Aset</h2>
			<form method=POST action='?module=peta2&act=cari'>
			<table id='example1' class='table table-bordered table-striped'>
				
				<tr> 
					<td valign='top'>Nama Aset</td>
					<td><input name='nama_aset' type='text' size='30'></td>
				</tr>
				<tr>
					<td>&nbsp</td><td>
						<input type=submit value=Search>
						<input type=button value=Batal onclick=self.history.back()>
					</td>
				</tr>
			</table>
			</form>"; ?>

    <!DOCTYPE html>
<html>
<head>
	<title>Peta Damkar Kota Bekasi</title>
	<link rel="stylesheet" href="leaflet/leaflet.css" />
	<script src="leaflet/leaflet.js"></script>
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
  require ('koneksi.php');
  $js='';
	$markernya='';
	//$data = mysqli_query($koneksi, 'SELECT DISTINCT email_user FROM pengaduan');
  $data = mysqli_query($koneksi,"SELECT * from aset group by nama_aset order by id_aset DESC");
  while ($row = mysqli_fetch_assoc($data)) {
		$data2 = mysqli_query($koneksi, "SELECT * from cabang WHERE id_cabang='$row[id_cabang]' ");
		$row2 = mysqli_fetch_assoc($data2);
		//var marker = L.marker([-6.238168, 106.991664]).addTo(map);
		 //$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b>'.$row['keterangan'].'</b>");';
		 		$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b></b></br>'.$row2['alamat'].'</br></br>.");';
	}
	echo "$js";
	?>	
	</script>
</body>
</html>
<?php  
    break;  
}
}
}
?>


<?php
//include "footer.php";
?>