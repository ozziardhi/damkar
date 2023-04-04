<?php
include "koneksi.php";
     echo "
     <h3>Detail Pengaduan</h3>";  

     echo "
     <table>"; 
				$tampil = mysqli_query($koneksi, "SELECT * FROM location where idlocation='$_GET[id]' ");		 
				$r=mysqli_fetch_array($tampil);
				echo "
				<tr><td>Tanggal</td><td>$r[tanggal]</td></tr>
				<tr><td>Keterangan</td><td>$r[keterangan]</td></tr>
				<tr><td>Kejadian</td><td>$r[kejadian]</td></tr>
				<tr><td>Status</td><td>$r[status]</td></tr>
				<tr><td>Petunjuk Arah</td><td><a href=http://maps.google.co.id/?q=$r[latitude],$r[longitude] target=_blank>Goto Map</a></td></tr>
			</table>";
						echo " <input type=button value=Back onclick=self.history.back()>&nbsp;&nbsp;&nbsp;";
			echo "<input type=button value='Petunjuk Arah' 
          onclick=\"window.location.href='http://maps.google.co.id/?q=$r[latitude],$r[longitude]';\">";
?>
