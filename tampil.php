<?php
include "koneksi.php";
echo "<h3>Daftar Laporan</h3>";  
echo "
<table border=1 width=100%>
	<tdirut>
		<tr><td>No</td><td>Tanggal</td><td>Kejadian</td></tr>"; 
		$query=mysqli_query($koneksi,"SELECT * FROM location order by idlocation DESC");
		$no=1;
		while ($r=mysqli_fetch_array($query)){
			echo "
			<tr>
			<td>$no</td>
			<td><a href=peta.php?id=$r[idlocation]>$r[tanggal]</td>
			<td>$r[kejadian]</td>
			</tr>";
			$no++;
		}
echo "
</table>";
?>