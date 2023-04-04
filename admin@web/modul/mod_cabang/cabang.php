<?php
$aksi="modul/mod_cabang/aksi_cabang.php";
function hitungJarak($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $unit = 'km', $desimal = 2) {
 // Menghitung jarak dalam derajat
 $derajat = rad2deg(acos((sin(deg2rad($lokasi1_lat))*sin(deg2rad($lokasi2_lat))) + (cos(deg2rad($lokasi1_lat))*cos(deg2rad($lokasi2_lat))*cos(deg2rad($lokasi1_long-$lokasi2_long)))));
 
 // Mengkonversi derajat kedalam unit yang dipilih (kilometer, mil atau mil laut)
 switch($unit) {
  case 'km':
   $jarak = $derajat * 111.13384; // 1 derajat = 111.13384 km, berdasarkan diameter rata-rata bumi (12,735 km)
   break;
  case 'mi':
   $jarak = $derajat * 69.05482; // 1 derajat = 69.05482 miles(mil), berdasarkan diameter rata-rata bumi (7,913.1 miles)
   break;
  case 'nmi':
   $jarak =  $derajat * 59.97662; // 1 derajat = 59.97662 nautic miles(mil laut), berdasarkan diameter rata-rata bumi (6,876.3 nautical miles)
 }
 return round($jarak, $desimal);
}
if (!isset($_GET['act'])) {
	if ($_SESSION['leveluser']=='admin'){
      $tampil = mysqli_query($koneksi,"SELECT * FROM users ORDER BY username");
	echo "
	
	<div class='widget-content'>	
			<h3 class='box-title'><input type=button class='btn btn-success' value='Add New' onclick=\"window.location.href='?module=cabang&act=tambah';\"></h3>";
		}
    else{
      $tampil=mysqli_query($koneksi,"SELECT * FROM users WHERE username='$_SESSION[namauser]'");
      echo"
	<div>";
}
echo"
	
	<div class='widget-header'>
		<i class='icon-th-large'></i>
		<h3>Data Master Cabang</h3>						
	</div> 
	<div class='widget-content'>		
		<div class='table-responsive'>
    <table id='example1' class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Cabang</th>
					<th>Nama Cabang</th>
					<th>Jarak</th>
					<th width='120'>Proses </th>
				</tr>
			</thead>							
			<tbody>";
			$tampil = mysqli_query($koneksi, "SELECT * FROM cabang ORDER by id_cabang DESC"); 
			$no = 1;
			while($r=mysqli_fetch_array($tampil)){
					$currentLat = "-6.233390"; //garis bujur lokasi mako 
					$currentLon = "106.981041"; //garis lintang lokasi mako
					$destLat = $r['latitude']; //garis bujur lokasi 2
					$destLon = $r['longitude']; //garis lintang lokasi 2	
				echo "
				<tr>
				 <td>$no</td>
				 <td><a href='?module=cabang&act=detail&id=$r[id_cabang]'>$r[kd_cabang]</td>
				 <td>$r[nama_cabang]</td>
				 <td>".hitungJarak($currentLat,$currentLon, $destLat, $destLon)."</td>
					<td align='center'>
						<a href='?module=cabang&act=edit&id=$r[id_cabang]' class='btn btn-small btn-success'>Edit</a> &nbsp;
						<a href='$aksi?module=cabang&act=hapus&id=$r[id_cabang]' class='btn btn-danger btn-small'>Delete</a>
					</td>
				</tr>";
					$no++;
				}
			echo "		               
			</tbody>
			</table>
		</div>
	</div>";
						
}
else {
	switch($_GET['act']){
 
 
  // Form Edit label  
  case "tambah":
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Master Data Cabang</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Tambah Cabang</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=cabang&act=input' enctype='multipart/form-data'>
			<fieldset>
				
				<div class='control-group'>											
					<label class='control-label'>Kode Cabang</label>
					<div class='controls'>
						<input type='text' class='span8' name='kd_cabang' required>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Nama Cabang</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_cabang' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Latitude</label>
					<div class='controls'>
						<input type='text' class='span8' name='latitude' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Longitude</label>
					<div class='controls'>
						<input type='text' class='span8' name='longitude' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Alamat</label>
					<div class='controls'>
						<textarea type='text' class='span8' name='alamat' required></textarea>
					</div>		
				</div> 
					
												
				<div class='form-actions'>
					<button type='submit' class='btn btn-primary'>Save</button> 
					<input type=button value='Cancel' onclick=self.history.back()>
				</div> 
			</fieldset>										
			</form>
		</div>";
	break;  
  // Form Edit label  
  case "edit":
    $edit=mysqli_query($koneksi,"SELECT * FROM cabang WHERE id_cabang='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Master Data Cabang</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Edit Cabang</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=cabang&act=update' enctype='multipart/form-data'>
			<fieldset>
				<input type=hidden name='id'  value='$r[id_cabang]'>		
				
				<div class='control-group'>											
					<label class='control-label'>Kode Cabang</label>
					<div class='controls'>
						<input type='text' class='span8' name='kd_cabang' value='$r[kd_cabang]' required readonly>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Nama Cabang</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_cabang' value='$r[nama_cabang]' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Latitude</label>
					<div class='controls'>
						<input type='text' class='span8' name='latitude' value='$r[latitude]' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Longitude</label>
					<div class='controls'>
						<input type='text' class='span8' name='longitude' value='$r[longitude]' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Alamat</label>
					<div class='controls'>
						<input type='text' class='span8' name='alamat' value='$r[alamat]' required>
					</div>		
				</div> 
												
				<div class='form-actions'>
					<button type='submit' class='btn btn-primary'>Save</button> 
					<input type=button value='Cancel' onclick=self.history.back()>
				</div> 
			</fieldset>										
			</form>
		</div>";
	break;  	

case "detail":
    $edit=mysqli_query($koneksi,"SELECT * FROM cabang WHERE id_cabang='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Data Master Cabang Detail</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Data Cabang</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=aset&act=update' enctype='multipart/form-data'>
			<table id='example1' class='table table-bordered table-hover'>
				<input type=hidden name='id'  value='$r[id_cabang]'>		

		 <tr><td>Kode Cabang</td> <td> $r[kd_cabang]</td></tr>	
         <tr><td>Nama Cabang</td> <td> $r[nama_cabang]</td></tr>
		 <tr><td>Latitude</td> <td> $r[latitude]</td></tr>		
		 <tr><td>Longitude</td> <td> $r[longitude]</td></tr>	
		 <tr><td>Alamat</td> <td> $r[alamat]</td></tr>	
      </table>
			<fieldset>
					
				
				<div class='form-actions'>
					
					<input type='button' class='btn btn-warning' value='Petunjuk Arah Google Map' onclick=\"window.location.href='http://maps.google.co.id/?q=$r[latitude],$r[longitude]';\" target='_blank'>
					<input type='button' class='btn btn-warning' value='Petunjuk Arah Openstreet Map' onclick=\"window.location.href='https://www.openstreetmap.org/directions?engine=fossgis_osrm_car&route=-6.223747,107.009282;$r[latitude],$r[longitude]';\" target='_blank'>
				</div> 
			</fieldset>										
			</form>
		</div>";
	break;  	

	}
}
?>
				