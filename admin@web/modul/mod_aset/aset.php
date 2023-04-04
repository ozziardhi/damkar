<?php
$aksi="modul/mod_aset/aksi_aset.php";
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
			<h3 class='box-title'><input type=button class='btn btn-success' value='Add New' onclick=\"window.location.href='?module=aset&act=tambah';\"></h3>";
		}
    else{
      $tampil=mysqli_query($koneksi,"SELECT * FROM users WHERE username='$_SESSION[namauser]'");
  echo"				
	<div>";
}
echo"
	<div class='widget-header'>
		<i class='icon-th-large'></i>
		<h3>Data Master Aset</h3>						
	</div> 
	<div class='widget-content'>		
		<div class='table-responsive'>
    <table id='example1' class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Aset</th>
					<th>Serial Number</th>
					<th>Nama Aset</th>
					<th>Kategori Aset</th>
					<th>Cabang</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Jarak</th>
					<th width='120'>Proses </th>
				</tr>
			</thead>							
			<tbody>";
			$tampil = mysqli_query($koneksi, "SELECT * FROM aset ORDER by id_aset DESC"); 
			$no = 1;
			while($r=mysqli_fetch_array($tampil)){
				$tampil2=mysqli_query($koneksi, "SELECT * FROM kategoriaset WHERE id_kategoriaset='$r[id_kategoriaset]'");
    			$r2=mysqli_fetch_array($tampil2);
    			$tampil3=mysqli_query($koneksi, "SELECT * FROM cabang WHERE id_cabang='$r[id_cabang]'");
    			$r3=mysqli_fetch_array($tampil3);
    							
					$currentLat = "-6.233390"; //garis bujur lokasi mako 
					$currentLon = "106.981041"; //garis lintang lokasi mako
					$destLat = $r['latitude']; //garis bujur lokasi 2
					$destLon = $r['longitude']; //garis lintang lokasi 2	
				echo "
				<tr>
				 <td>$no</td>
				 <td><a href='?module=aset&act=detail&id=$r[id_aset]'>$r[kd_aset]</td>
				 <td>$r[serial_number]</td>
				 <td>$r[nama_aset]</td>
				 <td>$r2[nama_kategoriaset]</td>
				 <td>$r3[nama_cabang]</td>
				 <td>$r[latitude]</td>
				 <td>$r[longitude]</td>
				 <td>".hitungJarak($currentLat,$currentLon, $destLat, $destLon)."</td>
					<td align='center'>
						<a href='?module=aset&act=edit&id=$r[id_aset]' class='btn btn-small btn-success'>Edit</a> &nbsp;
						<a href='$aksi?module=aset&act=hapus&id=$r[id_aset]' class='btn btn-danger btn-small'>Delete</a>
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
    if ($_SESSION['leveluser']=='admin'){
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Master Data Asset</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Tambah Asset</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=aset&act=input' enctype='multipart/form-data'>
			<fieldset>
				
				<div class='control-group'>											
					<label class='control-label'>Kode Asset</label>
					<div class='controls'>
						<input type='text' class='span8' name='kd_aset' required>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Serial Number</label>
					<div class='controls'>
						<input type='text' class='span8' name='serial_number' required>
					</div>		
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Nama Asset</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_aset' required>
					</div>			
				</div> 

				<div class='control-group'>
					<label class='control-label'>Kategori Asset</label>
					<div class='controls'>
						<select class='form-control' name='id_kategoriaset' required>
							<option value=''>--- Pilih Kategori Asset ---</option>";
							$tampil1=mysqli_query($koneksi,"SELECT * FROM kategoriaset ORDER BY id_kategoriaset DESC");
							while($data_kategori=mysqli_fetch_array($tampil1)){
							echo "<option value='$data_kategori[id_kategoriaset]'>$data_kategori[nama_kategoriaset]</option>";
							}
							echo "										
						</select>
					</div>
				</div>

				<div class='control-group'>
					<label class='control-label'>Cabang</label>
					<div class='controls'>
						<select class='form-control' name='id_cabang' required>
							<option value=''>--- Pilih Cabang ---</option>";
							$tampil2=mysqli_query($koneksi,"SELECT * FROM cabang ORDER BY id_cabang DESC");
							while($data_cabang=mysqli_fetch_array($tampil2)){
							echo "<option value='$data_cabang[id_cabang]'>$data_cabang[nama_cabang]</option>";
							}
							echo "										
						</select>
					</div>
				</div>
				<div class='control-group'>											
					<label class='control-label'>Satuan</label>
					<div class='controls'>
						<input type='text' class='span8' name='satuan' required>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Harga Beli</label>
					<div class='controls'>
						<input type='text' class='span8' name='harga_beli' required>
					</div>		
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Tanggal Masuk</label>
					<div class='controls'>
						<input type='date' class='span8' name='tgl_masuk' required>
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
					<label class='control-label'>Kondisi</label>
					<div class='controls'>
						<div class='radio'>                                           
							<label>
							<input type='radio' name='kondisi' id='optionsRadios1' value='baik' checked required> Baik
							</label>
						</div>
						<div class='radio'>
							<label>
							<input type='radio' name='kondisi' id='optionsRadios2' value='rusak' required> Rusak
							</label>
						</div>
						<div class='radio'>
							<label>
							<input type='radio' name='kondisi' id='optionsRadios2' value='dissposal' required> Dissposal
							</label>
						</div>
					</div>
				<div>		

				<div class='control-group'>
					<label class='control-label'>Departement</label>
					<div class='controls'>
						<select class='form-control' name='id_departement' required>
							<option value=''>--- Pilih Departement ---</option>";
							$tampil3=mysqli_query($koneksi,"SELECT * FROM departement ORDER BY id_departement DESC");
							while($data_departement=mysqli_fetch_array($tampil3)){
							echo "<option value='$data_departement[id_departement]'>$data_departement[nama_departement]</option>";
							}
							echo "										
						</select>
					</div>
				</div>
				
				<div class='control-group'>
                    <label class='control-label' for='exampleInputFile'>Foto</label>
                    <div class='controls'>
                    	<input type='file' name='fupload' id='exampleInputFile' required>
                    	<p class='help-block'><i>File gambar harus berekstention .JPG / PNG Resolusi Optimal 215 x 215</i></p>
                    </div>
                </div>
				
												
				<div class='form-actions'>
					<button type='submit' class='btn btn-primary'>Save</button> 
					<input type=button value='Cancel' onclick=self.history.back()>
				</div> 
			</fieldset>										
			</form>
		</div>";
	}
	break;  

 case "detail":
    $edit=mysqli_query($koneksi,"SELECT * FROM aset WHERE id_aset='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
    $edit2=mysqli_query($koneksi,"SELECT * FROM cabang WHERE id_cabang='$r[id_cabang]'");
    $r2=mysqli_fetch_array($edit2);		
    $edit3=mysqli_query($koneksi,"SELECT * FROM kategoriaset WHERE id_kategoriaset='$r[id_kategoriaset]'");
    $r3=mysqli_fetch_array($edit3);		
    $edit4=mysqli_query($koneksi,"SELECT * FROM departement WHERE id_departement='$r[id_departement]'");
    $r4=mysqli_fetch_array($edit4);		
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Data Master Asset Detail</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Data Asset</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=aset&act=update' enctype='multipart/form-data'>
			<table id='example1' class='table table-bordered table-hover'>
				<input type=hidden name='id'  value='$r[id_aset]'>		

				 <tr><td>Kode Aset</td> <td> $r[kd_aset]</td></tr>
				 <tr><td>Serial Number</td> <td> $r[serial_number]</td></tr>	
        		 <tr><td>Nama Aset</td> <td> $r[nama_aset]</td></tr>
   				 <tr><td>Kategori Aset</td> <td> $r3[nama_kategoriaset]</td></tr>	
        		 <tr><td>Nama Cabang</td> <td> $r2[nama_cabang]</td></tr>
		 		 <tr><td>Satuan</td> <td> $r[satuan]</td></tr>		
		 		 <tr><td>Harga Beli</td> <td> $r[harga_beli]</td></tr>	
				 <tr><td>Tanggal Masuk</td> <td> $r[tgl_masuk]</td></tr>	
		 		 <tr><td>Latitude</td> <td> $r[latitude]</td></tr>		
		 		 <tr><td>Longitude</td> <td> $r[longitude]</td></tr>	
				 <tr><td>Kondisi</td> <td> $r[kondisi]</td></tr>	
				 <tr><td>Nama Departement</td> <td> $r4[nama_departement]</td></tr>
				 <tr><td>Foto Aset</td><td align='center'> <img src='../foto_aset/small_$r[foto]' class='img-circle' alt='User Image' /></td>
				 
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

  // Form Edit label  
  case "edit":
    $edit=mysqli_query($koneksi,"SELECT * FROM aset WHERE id_aset='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Master Data Asset</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Edit Asset</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=aset&act=update' enctype='multipart/form-data'>
			<fieldset>
				<input type=hidden name='id'  value='$r[id_aset]'>		
				
				<div class='control-group'>											
					<label class='control-label'>Kode Asset</label>
					<div class='controls'>
						<input type='text' class='span8' name='kd_aset' value='$r[kd_aset]' required readonly>
					</div>			
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Serial Number</label>
					<div class='controls'>
						<input type='text' class='span8' name='serial_number' value='$r[serial_number]' required>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Nama Asset</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_aset' value='$r[nama_aset]' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Kategori Asset</label>
					<div class='controls'>
						<select class='form-control' name='id_kategoriaset' required>";
							if ($r['id_kategoriaset']==0){
							echo "<option value=0 selected>- Pilih Kategori Asset -</option>";
								}   
							$tampil1=mysqli_query($koneksi, "SELECT * FROM kategoriaset ORDER BY nama_kategoriaset");
							while($kategoriaset=mysqli_fetch_array($tampil1)){
							if ($r['id_kategoriaset']==$kategoriaset['id_kategoriaset']){
							echo "<option value=$kategoriaset[id_kategoriaset] selected>$kategoriaset[nama_kategoriaset]</option>";
								}
							else{
							echo "<option value=$kategoriaset[id_kategoriaset]>$kategoriaset[nama_kategoriaset]</option>";
								}
							}
						echo "</select>
					</div>
				</div>

				<div class='control-group'>											
					<label class='control-label'>Cabang</label>
					<div class='controls'>
						<select class='form-control' name='id_cabang' required>";
							if ($r['id_cabang']==0){
							echo "<option value=0 selected>- Pilih Cabang -</option>";
								}   
							$tampil2=mysqli_query($koneksi, "SELECT * FROM cabang ORDER BY nama_cabang");
							while($cabang=mysqli_fetch_array($tampil2)){
							if ($r['id_cabang']==$cabang['id_cabang']){
							echo "<option value=$cabang[id_cabang] selected>$cabang[nama_cabang]</option>";
								}
							else{
							echo "<option value=$cabang[id_cabang]>$cabang[nama_cabang]</option>";
								}
							}
						echo "</select>
					</div>
				</div>

				<div class='control-group'>											
					<label class='control-label'>Satuan</label>
					<div class='controls'>
						<input type='text' class='span8' name='satuan' value='$r[satuan]' required>
					</div>		
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Harga Beli</label>
					<div class='controls'>
						<input type='text' class='span8' name='harga_beli' value='$r[harga_beli]' required>
					</div>		
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Tanggal Masuk</label>
					<div class='controls'>
						<input type='date' class='span8' name='tgl_masuk' value='$r[tgl_masuk]' required>
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
					<label class='control-label'>Kondisi</label>
					 <div class='controls'>
						<div class='radio'>";
							if ($r['kondisi']=='baik'){
								echo "
									<label>
											<input type='radio' name='kondisi' id='optionsRadios1' value='baik' checked required> Baik
									</label>
						</div>
						<div class='radio'>
									<label>
											<input type='radio' name='kondisi' id='optionsRadios2' value='disposal' required> Rusak
									</label>";
							}
							else{
								echo" 
								<label>
									<input type='radio' name='kondisi' id='optionsRadios1' value='baik' required> Baik
								</label>
						</div>
						<div class='radio'>
							<label>
									<input type='radio' name='kondisi' id='optionsRadios2' value='disposal' checked required> Disposal
							</label>";
							}
						echo "
						</div>                                            
					</div>
				</div>

				<div class='control-group'>											
					<label class='control-label'>Nama Departement</label>
					<div class='controls'>
						<select class='form-control' name='id_departement' required>";
							if ($r['kd_departement']==0){
							echo "<option value=0 selected>- Pilih Departement -</option>";
								}   
							$tampil3=mysqli_query($koneksi, "SELECT * FROM departement ORDER BY nama_departement");
							while($departement=mysqli_fetch_array($tampil3)){
							if ($r['id_departement']==$departement['id_departement']){
							echo "<option value=$departement[id_departement] selected>$departement[nama_departement]</option>";
								}
							else{
							echo "<option value=$departement[id_departement]>$departement[nama_departement]</option>";
								}
							}
						echo "</select>
					</div>
				</div>

				<div class='control-group'>
                    <label class='control-label' for='exampleInputFile'>Preview Foto</label><br />
                    <div class='controls'>
                      <img src='../foto_aset/$r[foto]' height='20%' width='20%'>  
                        <p class='help-block'><i>Foto Yang Aktif</i></p>   
                    </div>                                      
                </div>
                <div class='control-group'>
                    <label class='control-label' for='exampleInputFile'>Foto</label>
                    <div class='controls'>
                    	<input type='file' name='fupload' id='exampleInputFile' required>
                    	<p class='help-block'><i>File gambar harus berekstention .JPG / PNG Resolusi Optimal 215 x 215</i></p>
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
	}
}
?>
				