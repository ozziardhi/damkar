<?php
session_start();
include "config/koneksi.php";
if ($_GET['module']=='home'){
	?>
	<!-- products -->
	<section class="products py-5">
		<div class="container py-lg-5 py-3">
		<!--	<h3 class="heading mb-sm-5 mb-4">Main Menu</h3> -->
			<div class="row products_grids text-center mt-5">
				<div class="col-md-3 col-6 grid4">
					<div class="prodct1 border p-3">
						<a href="?module=pengaduan">
							<img src="images/a1.png" alt="" class="img-fluid">
							<h3 class="mt-2">Pengaduan Masyarakat</h3>
							<span class="fa fa-long-arrow-right"></span>
						</a>
					</div>
				</div>
				<div class="col-md-3 col-6 grid5">
					<div class="prodct1 border p-3">
						<a href="contact.php">
							<img src="images/a11.png" alt="" class="img-fluid">
							<h3 class="mt-2">Info Pengembang</h3>
							<span class="fa fa-long-arrow-right"></span>
						</a>
					</div>
				</div>
				
				<div class="col-md-3 col-6 grid6 mt-md-0 mt-3">
					<div class="prodct1 border p-3">
						<a href="?module=suratinternal">
							<img src="images/a12.png" alt="" class="img-fluid">
							<h3 class="mt-2">Tentang Aplikasi</h3>
							<span class="fa fa-long-arrow-right"></span>
						</a>
					</div>
				</div>
				
				<div class="col-md-3 col-6 grid6 mt-md-0 mt-3">
					<div class="prodct1 border p-3">
						<a href="?module=berita">
							<img src="images/a9.png" alt="" class="img-fluid">
							<h3 class="mt-2">Info & Berita Kebakaran</h3>
							<span class="fa fa-long-arrow-right"></span>
						</a>
					</div>
				</div>
						
			</div>
		</div>
	</section>
	<!-- //products -->
	<?php
}

elseif ($_GET['module']=='register'){
    include "modul/mod_register/register.php";
}
elseif ($_GET['module']=='berita'){
    include "modul/mod_berita/berita.php";
}

elseif ($_GET['module']=='infoaplikasi'){
    include "modul/mod_infoaplikasi/infoaplikasi.php";
}
elseif ($_GET['module']=='pengaduan'){
    include "modul/mod_pengaduan/pengaduan.php";
}
elseif ($_GET['module']=='contact'){
    include "contact.php";
}
else{
  echo "
	<section class='products py-2'>
	<div class='container'>	
	<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>
	</section>";
}
?>
