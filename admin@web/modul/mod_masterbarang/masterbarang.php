<?php
$aksi="modul/mod_masterbarang/aksi_masterbarang.php";
if (!isset($_GET['act'])) {
	echo "
	<div class='widget-header'>
		<i class='icon-th-large'></i>
		<h3>Data Master Barang</h3>						
	</div> 
	<div class='widget-content'>	
			<h3 class='box-title'><input type=button class='btn btn-success' value='Add New' onclick=\"window.location.href='?module=masterbarang&act=tambah';\"></h3>				
	<div>
	<br>
	<div class='widget-content'>		
		<div class='table-responsive'>
    <table id='example1' class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Aset</th>
					<th>Nama Aset</th>
					<th>Kategori Aset</th>
					<th width='120'>Proses </th>
				</tr>
			</thead>							
			<tbody>";
			$tampil = mysqli_query($koneksi, "SELECT * FROM master_barang ORDER by id_masterbarang DESC"); 
			$no = 1;
			while($r=mysqli_fetch_array($tampil)){
				$tampil2=mysqli_query($koneksi, "SELECT * FROM kategoriaset WHERE id_kategoriaset='$r[id_kategoriaset]'");
    			$r2=mysqli_fetch_array($tampil2);
				echo "
				<tr>
				 <td>$no</td>
				 <td><a href='?module=masterbarang&act=detail&id=$r[id_masterbarang]'>$r[kd_aset]</td>
				 <td>$r[nama_aset]</td>
				 <td>$r2[nama_kategoriaset]</td>
					<td align='center'>
						<a href='?module=masterbarang&act=edit&id=$r[id_masterbarang]' class='btn btn-small btn-success'>Edit</a> &nbsp;
						<a href='$aksi?module=masterbarang&act=hapus&id=$r[id_masterbarang]' class='btn btn-danger btn-small'>Delete</a>
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
			<h3>Master Data Barang</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Tambah Barang</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=masterbarang&act=input' enctype='multipart/form-data'>
			<fieldset>
				
				<div class='control-group'>											
					<label class='control-label'>Kode Aset</label>
					<div class='controls'>
						<input type='text' class='span8' name='kd_aset'>
					</div>			
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Nama Aset</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_aset'>
					</div>			
				</div> 

				<div class='control-group'>
					<label class='control-label'>Kategori Aset</label>
					<div class='controls'>
						<select class='form-control' name='id_kategoriaset'>
							<option value=''>--- Pilih Kategori Aset ---</option>";
							$tampil1=mysqli_query($koneksi,"SELECT * FROM kategoriaset ORDER BY id_kategoriaset DESC");
							while($data_kategori=mysqli_fetch_array($tampil1)){
							echo "<option value='$data_kategori[id_kategoriaset]'>$data_kategori[nama_kategoriaset]</option>";
							}
							echo "										
						</select>
					</div>
				</div>

				<div class='control-group'>											
					<label class='control-label'>Satuan</label>
					<div class='controls'>
						<input type='text' class='span8' name='satuan'>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Tahun Beli</label>
					<div class='controls'>
						<input type='text' class='span8' name='tahun_beli'>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Harga Beli</label>
					<div class='controls'>
						<input type='text' class='span8' name='harga_beli'>
					</div>		
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Tahun Jual</label>
					<div class='controls'>
						<input type='text' class='span8' name='tahun_jual'>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Harga Jual</label>
					<div class='controls'>
						<input type='text' class='span8' name='harga_jual'>
					</div>		
				</div> 
				
				<div class='control-group'>
                    <label class='control-label' for='exampleInputFile'>Foto</label>
                    <div class='controls'>
                    	<input type='file' name='fupload' id='exampleInputFile'>
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

 case "detail":
    $edit=mysqli_query($koneksi,"SELECT * FROM master_barang WHERE id_masterbarang='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
    $edit3=mysqli_query($koneksi,"SELECT * FROM kategoriaset WHERE id_kategoriaset='$r[id_kategoriaset]'");
    $r3=mysqli_fetch_array($edit3);		
    		
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Data Master Barang Detail</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Data Barang</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=masterbarang&act=update' enctype='multipart/form-data'>
			<fieldset>
				<input type=hidden name='id'  value='$r[id_masterbarang]'>		

				<div class='control-group'>											
					<label class='control-label'>Kode Aset</label>
					<div class='controls'><input type='text' class='span8' name='kd_aset' value='$r[kd_aset]'></div>			
				</div> 
				
				
				<div class='control-group'>											
					<label class='control-label'>Nama Aset</label>
					<div class='controls'><input type='text' class='span8' name='nama_aset' value='$r[nama_aset]'></div>		
				</div> 
					
				<div class='control-group'>											
					<label class='control-label'>Kategori Asset</label>
					<div class='controls'><input type='text' class='span8' name='id_kategoriaset' value='$r3[nama_kategoriaset]'></div> 		
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Satuan</label>
					<div class='controls'><input type='text' class='span8' name='satuan' value='$r[satuan]'></div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Tahun Beli</label>
					<div class='controls'><input type='text' class='span8' name='tahun_beli' value='$r[tahun_beli]'></div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Harga Beli</label>
					<div class='controls'><input type='text' class='span8' name='harga_beli' value='$r[harga_beli]'></div> 		
				</div> 		
				
				<div class='control-group'>											
					<label class='control-label'>Tahun Jual</label>
					<div class='controls'><input type='text' class='span8' name='tahun_jual' value='$r[tahun_jual]'></div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Harga Beli</label>
					<div class='controls'><input type='text' class='span8' name='harga_jual' value='$r[harga_jual]'></div> 		
				</div> 		

				<div class='control-group'>											
					<label class='control-label'>Foto</label>
					<div class='controls'><img src='../foto_aset/$r[foto]' width='100' height='100'></div> 		
				</div> 
				
			</fieldset>										
			</form>
		</div>";
	break;  	

  // Form Edit label  
  case "edit":
    $edit=mysqli_query($koneksi,"SELECT * FROM master_barang WHERE id_masterbarang='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Master Data Barang</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Edit Barang</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=masterbarang&act=update' enctype='multipart/form-data'>
			<fieldset>
				<input type=hidden name='id'  value='$r[id_masterbarang]'>		
				
				<div class='control-group'>											
					<label class='control-label'>Kode Aset</label>
					<div class='controls'>
						<input type='text' class='span8' name='kd_aset' value='$r[kd_aset]'>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Nama Aset</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_aset' value='$r[nama_aset]'>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Kategori Asset</label>
					<div class='controls'>
						<select class='form-control' name='id_kategoriaset'>";
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
					<label class='control-label'>Satuan</label>
					<div class='controls'>
						<input type='text' class='span8' name='satuan' value='$r[satuan]'>
					</div>		
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Tahun Beli</label>
					<div class='controls'>
						<input type='text' class='span8' name='tahun_beli' value='$r[tahun_beli]'>
					</div>		
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Harga Beli</label>
					<div class='controls'>
						<input type='text' class='span8' name='harga_beli' value='$r[harga_beli]'>
					</div>		
				</div> 
				
					<div class='control-group'>											
					<label class='control-label'>Tahun Jual</label>
					<div class='controls'>
						<input type='text' class='span8' name='tahun_jual' value='$r[tahun_jual]'>
					</div>		
				</div> 
				<div class='control-group'>											
					<label class='control-label'>Harga Jual</label>
					<div class='controls'>
						<input type='text' class='span8' name='harga_jual' value='$r[harga_jual]'>
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
				