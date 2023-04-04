<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/fungsi_rupiah.php";
?>    
<div class="main">	
	<div class="main-inner">
		<div class="container">
			<div class="row">      	
				<div class="span12">	      		
					<div class="widget">		
					<div class="widget-content">
						<?php

						
                   include "content-one.php"; 
						if ($_GET['module']=='home'){?>
							<?php  
							 if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user' OR $_SESSION['leveluser']=='petugas' OR $_SESSION['leveluser']=='kepala'){
							echo "																
							<img src='img/admin2.png' width='100%'>";
						}
					}
						// Bagian Download
						elseif ($_GET['module']=='cabang'){
							if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user' OR $_SESSION['leveluser']=='kepala'){
								include "modul/mod_cabang/cabang.php";
						}
						}

						// Bagian Menu Utama
						elseif ($_GET['module']=='aset'){
							 if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user' OR $_SESSION['leveluser']=='kepala'){
								include "modul/mod_aset/aset.php";
						}
					}
						elseif ($_GET['module']=='masterbarang'){
								include "modul/mod_masterbarang/masterbarang.php";
						}
						
								
						else {						
								echo "<script>
												alert('Modul tidak ditemukan');
												document.location.href='?module=home';
										</script>";
						}							
						?>													
						</div> <!-- /widget-content -->								
					</div> <!-- /widget -->									
				</div> <!-- /span12 -->     		      		      	
			</div> <!-- /row -->	
		</div> <!-- /container -->	    
	</div> <!-- /main-inner -->    
</div> <!-- /main -->
   