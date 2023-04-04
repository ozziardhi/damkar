<?php
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_users/aksi_users.php";
if (!isset($_GET['act'])) {
	 if ($_SESSION['leveluser']=='admin'){
      $tampil = mysqli_query($koneksi,"SELECT * FROM users ORDER BY id_users DESC");
	echo "
	<div class='widget-header'>
		<i class='icon-th-large'></i>
		<h3>Data Master User</h3>						
	</div> 
	<div class='widget-content'>	
			<h3 class='box-title'><input type=button class='btn btn-success' value='Add New' onclick=\"window.location.href='?module=users&act=tambah';\"></h3>";
    }
    else{
      $tampil=mysqli_query($koneksi,"SELECT * FROM users WHERE username='$_SESSION[namauser]'");
      echo "			
	<div>";
}
echo"
	<br>
	<div class='widget-content'>		
		<div class='table-responsive'>
    <table id='example1' class='table table-bordered'>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Lengkap</th>
					<th>Username</th>
					<th>Email User</th>					
					<th>Telp</th>
					<th width='120'>Proses </th>
				</tr>
			</thead>							
			<tbody>";
			
			$no = 1;
			while($r=mysqli_fetch_array($tampil)){
				echo "
				<tr>
				 <td>$no</td>
				 <td><a href='?module=users&act=detail&id=$r[id_users]'>$r[nama_lengkap]</td>
				 <td>$r[username]</td>
				 <td>$r[email]</td>				 
				 <td>$r[no_telp]</td>
					<td align='center'>
						<a href='?module=users&act=edit&id=$r[id_users]' class='btn btn-small btn-success'>Edit</a> &nbsp;
						<a href='$aksi?module=users&act=hapus&id=$r[id_users]' class='btn btn-danger btn-small'>Delete</a>
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
			<h3>Master User</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Tambah User</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=users&act=input' enctype='multipart/form-data'>
			<fieldset>
				
				<div class='control-group'>											
					<label class='control-label'>Username</label>
					<div class='controls'>
						<input type='text' class='span8' name='username' required>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Password</label>
					<div class='controls'>
						<input type='text' class='span8' name='password' required>
					</div>		
				</div> 
					
				<div class='control-group'>											
					<label class='control-label'>Nama Lengkap</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_lengkap' required>
					</div> 		
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Email User</label>
					<div class='controls'>
						<input type='email' class='span8' name='email' required>
					</div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Nomor Telpon</label>
					<div class='controls'>
						<input type='number' class='span8' name='no_telp' required>
					</div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Level</label>
					<div class='controls'>
						<input type='text' class='span8' name='level' required>
					</div> 		
				</div> 

				<div class='control-group'>
					<label class='control-label'>Blokir</label>
					<div class='controls'>
						<div class='radio'>                                           
							<label>
							<input type='radio' name='blokir' id='optionsRadios1' value='Y' required> Yes
							</label>
						</div>
						<div class='radio'>
							<label>
							<input type='radio' name='blokir' id='optionsRadios2' value='N' required> No
							</label>
						</div>
					</div>
				<div>	
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
    $edit=mysqli_query($koneksi,"SELECT * FROM users WHERE id_users='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
   	
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Data Master User Detail</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Data User</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=user&act=update' enctype='multipart/form-data'>
			<fieldset>
				<input type=hidden name='id'  value='$r[id_users]'>		

				<div class='control-group'>											
					<label class='control-label'>Username</label>
					<div class='controls'><input type='text' class='span8' name='username' value='$r[username]'></div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Password</label>
					<div class='controls'><input type='text' class='span8' name='password' value='$r[password]'></div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Nama Lengkap</label>
					<div class='controls'><input type='text' class='span8' name='nama_lengkap' value='$r[nama_lengkap]'></div>		
				</div> 
					
				<div class='control-group'>											
					<label class='control-label'>Email</label>
					<div class='controls'><input type='email' class='span8' name='email' value='$r[email]'></div> 		
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>No Telephone</label>
					<div class='controls'><input type='number' class='span8' name='no_telp' value='$r[no_telp]'></div> 		
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Level</label>
					<div class='controls'><input type='text' class='span8' name='level' value='$r[level]'></div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Blokir</label>
					<div class='controls'><input type='text' class='span8' name='blokir' value='$r[blokir]'></div> 		
				</div> 		
				
				<div class='control-group'>											
					<label class='control-label'>Foto</label>
					<div class='controls'><img src='../foto_users/small_$r[foto_user]' width='100' height='100'></div> 		
				</div> 
				
			</fieldset>										
			</form>
		</div>";
	break;  	

  // Form Edit label  
  case "edit":
    $edit=mysqli_query($koneksi,"SELECT * FROM users WHERE id_users='$_GET[id]'");
    $r=mysqli_fetch_array($edit);
      
		echo "
		<div class='widget-header'>
			<i class='icon-th-large'></i>
			<h3>Master User</h3>						
		</div> 	
		<div class='widget-content'>				
			<h3>Edit User</h3>
			<br>	
			<form  class='form-horizontal' method=POST action='$aksi?module=users&act=update' enctype='multipart/form-data'>
			<fieldset>
				<input type=hidden name='id'  value='$r[id_users]'>		
				
				<div class='control-group'>											
					<label class='control-label'>Nama User</label>
					<div class='controls'>
						<input type='text' class='span8' name='username' value='$r[username]' required readonly>
					</div>			
				</div> 
				
				<div class='control-group'>											
					<label class='control-label'>Password</label>
					<div class='controls'>
						<input type='text' class='span8' name='password' value='$r[password]' required>
					</div>		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Nama Lengkap</label>
					<div class='controls'>
						<input type='text' class='span8' name='nama_lengkap' value='$r[nama_lengkap]' required>
					</div>		
				</div> 
					
				<div class='control-group'>											
					<label class='control-label'>Email</label>
					<div class='controls'>
						<input type='text' class='span8' name='email' value='$r[email]' required>
					</div> 		
				</div> 

				<div class='control-group'>											
					<label class='control-label'>Nomor Telpon</label>
					<div class='controls'>
						<input type='text'  name='no_telp' value='$r[no_telp]' required>
					</div> 		
				</div>

				<div class='control-group'>											
					<label class='control-label'>Level</label>
					<div class='controls'>
						<input type='text'  name='level' value='$r[level]' required>
					</div> 		
				</div>

				<div class='control-group'>
					<label class='control-label'>Status Blokir</label>
					 <div class='controls'>
						<div class='radio'>";
							if ($r['blokir']=='Y'){
								echo "
									<label>
											<input type='radio' name='blokir' id='optionsRadios1' value='Y' checked required> Yes
									</label>
						</div>
						<div class='radio'>
									<label>
											<input type='radio' name='blokir' id='optionsRadios2' value='N' required> No
									</label>";
							}
							else{
								echo" 
								<label>
									<input type='radio' name='blokir' id='optionsRadios1' value='Y' required> Yes
								</label>
						</div>
						<div class='radio'>
							<label>
									<input type='radio' name='blokir' id='optionsRadios2' value='N' checked required> No
							</label>";
							}
						echo "
						</div>                                            
					</div>
				</div>

    			<div class='control-group'>
                    <label class='control-label' for='exampleInputFile'>Preview Foto</label><br />
                    <div class='controls'>
                      <img src='../foto_users/$r[foto_user]' height='20%' width='20%'>  
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
}
?>
				