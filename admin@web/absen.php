<?php
require ('koneksi.php');
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
	echo "
	<div class='widget-header'>
		<i class='icon-th-large'></i>
		<h3>Absen Online</h3>						
	</div> 
	<br>
	<div class='widget-content'>		
		<div class='table-responsive'>
    <table width='100%' border='1'>
			<thead>
			<tr>
			<th>No</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Tanggal</th>
			<th>Latitude</th>
			<th>Jarak</th>
			<th>Kode Absen</td>
			</tr>"; 		
    $tampil=mysqli_query($koneksi,"SELECT * FROM pengaduan ORDER BY id_pengaduan DESC LIMIT 200");
    $no=1;
    while ($r=mysqli_fetch_array($tampil)){
			$tampil2 = mysqli_query($koneksi, "SELECT * from users WHERE email='$r[email_user]' ");
			$r2 = mysqli_fetch_assoc($tampil2);			
			$aduan= substr($r['tanggal'],0,10);			
			$currentLat = "-6.223790"; //garis bujur lokasi kampus
			$currentLon = "107.009303"; //garis lintang lokasi kampus
			$destLat = $r['latitude']; //garis bujur lokasi 2
			$destLon = $r['longitude']; //garis lintang lokasi 2			
			echo "
			<tr>
				<td>$no</td>
				<td>$r[email_user]</td>
				<td>$r2[username]</td>
				<td>$r[tanggal]</td>
				<td>$r[latitude]</td>
				<td>".hitungJarak($currentLat,$currentLon, $destLat, $destLon)."</td>
				<td>$r[kejadian]</td>			
			</tr>";
      $no++;
    }
    echo "</tbody></table></div></div>";
    
}
else {
	switch($_GET['act']){
 
 
  // Form Edit label  
  case "tambah":
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Absensi Dosen & Staff</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Tambah Pengaduan</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=pengaduan&act=input' enctype='multipart/form-data'>
			<fieldset>
				
				<div class='control-group'>											
					<label class='control-label'>Tanggal</label>
					<div class='controls'>
						<input type='text' class='span8' name='tanggal'>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Latitude</label>
					<div class='controls'>
						<input type='text' class='span8' name='latitude'>
					</div>		
				</div> 
					
				<div class='control-group'>											
					<label class='control-label'>Longitude</label>
					<div class='controls'>
						<input type='text' class='span8' name='longitude'>
					</div> 		
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Keterangan</label>
					<div class='controls'>
						<textarea class='span8' name='keterangan'></textarea>
					</div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Email Address</label>
					<div class='controls'>
						<input type='text' class='span8' name='email_user'>
					</div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Laporan Kejadian</label>
					<div class='controls'>
						<input type='text' class='span8' name='kejadian'>
					</div> 		
				</div> 				

				<div class='control-group'>											
					<label class='control-label'>Status Laporan</label>
					<div class='controls'>
						<input type='text' class='span8' name='status'>
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
  case "detail":
    $edit=mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
    $edit2=mysqli_query($koneksi,"SELECT * FROM users WHERE email='$r[email_user]'");
    $r2=mysqli_fetch_array($edit2);		
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Absensi Mahasiswa</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Absensi</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=pengaduan&act=update' enctype='multipart/form-data'>
			<fieldset>
				<input type=hidden name='id'  value='$r[id_pengaduan]'>		

				<div class='control-group'>											
					<label class='control-label'>Nama Mahasiswa</label>
					<div class='controls'><input type='text' class='span8' name='tanggal' value='$r2[username]'></div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Tanggal</label>
					<div class='controls'><input type='text' class='span8' name='tanggal' value='$r[tanggal]'></div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Latitude</label>
					<div class='controls'><input type='text' class='span8' name='latitude' value='$r[latitude]'></div>		
				</div> 
					
				<div class='control-group'>											
					<label class='control-label'>Longitude</label>
					<div class='controls'><input type='text' class='span8' name='longitude' value='$r[longitude]'></div> 		
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Lokasi Alamat Absen</label>
					<div class='controls'><textarea class='span8' name='keterangan'>$r[keterangan]</textarea></div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Nomor Pokok Mahasiswa</label>
					<div class='controls'><input type='text' class='span8' name='email_user' value='$r[email_user]'></div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Nomor Telpon</label>
					<div class='controls'><input type='text' class='span8' name='kejadian' value='$r[kejadian]'></div> 		
				</div> 				
				
				<div class='form-actions'>
					<button type='submit' class='btn btn-primary'>Save</button> 
					<input type=button value='Cancel' onclick=self.history.back()>
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
