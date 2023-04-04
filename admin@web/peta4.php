<?php
//include "header.php";
?>

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
  $data = mysqli_query($koneksi,"SELECT * from cabang group by nama_cabang order by id_cabang DESC");
  while ($row = mysqli_fetch_assoc($data)) {
		//$data2 = mysqli_query($koneksi, "SELECT * from users WHERE email='$row[email_user]' ");
		//$row2 = mysqli_fetch_assoc($data2);
		//var marker = L.marker([-6.238168, 106.991664]).addTo(map);
		 //$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b>'.$row['keterangan'].'</b>");';
		 		$js .= 'L.marker(['.$row['latitude'].', '.$row['longitude'].']).addTo(map).bindPopup("<b></b></br>'.$row['alamat'].'</br></br>.");';
	}
	echo "$js";
	?>	
	</script>
</body>
</html>
<?php
//include "footer.php";
?>