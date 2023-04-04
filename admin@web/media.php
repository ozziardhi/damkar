<?php
session_start();
include "../config/koneksi.php";
include "encrypt.php";
include "timeout.php";
if($_SESSION['login']==1){
	if(!cek_login()){
		$_SESSION['login'] = 0;
	}
}
if($_SESSION['login']==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Damkar Kota Bekasi</title>   
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/pages/dashboard.css" rel="stylesheet">
		<!--	<link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet"> -->
		<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
<body>
<div class="navbar navbar-fixed-top">	
	<div class="navbar-inner">		
		<div class="container">			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>			
			<a class="brand" href="media.php?module=home">
				<img src='img/damkar-kecil1.png'> Damkar Kota Bekasi
			</a>					
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<!--<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Account
							<b class="caret"></b>
						</a>						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Settings</a></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>						
					</li>		-->	
					<li class="dropdown user user-menu">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="glyphicon glyphicon-user"></i> 
							<?php echo "$_SESSION[namalengkap]"; ?>
							<b class="caret"></b>
						</a>						
						<ul class="dropdown-menu">
							 <?php  $staff= $_SESSION['namauser'];                            
																$sq1 = mysqli_query($koneksi,"SELECT * from users where username='$staff'");
																$n1 = mysqli_fetch_array($sq1);
                                echo "
                                <li class='user-header bg-light-blue'>
                                    <img src='../foto_users/small_$n1[foto_user]' class='img-circle' alt='User Image' />
                                    <p>
                                        $staff - $_SESSION[namalengkap]
                                        <small>$staff Member since Nov. 2012</small>
                                    </p>
                                </li>";?>
							<li><a href="?module=users">Profile</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>						
					</li>
				</ul>			

								
			</div><!--/.nav-collapse -->		
		</div> <!-- /container -->		
	</div> <!-- /navbar-inner -->	
</div> <!-- /navbar -->
      
<!--<div class="subnavbar">
	<div class="subnavbar-inner">
		<div class="container">
			<ul class="mainnav">			
				<li class="active dropdown">
					<a href="?module=home">
						<i class="icon-home"></i>
						<span>Home</span>
					</a>	    				
				</li>															
				<li class="active dropdown">					
					<a href="?module=cabang">
						<i class="icon-building"></i>
						<span>Cabang</span>
					</a>  									
				</li>   
				<li class="active dropdown">					
					<a href="?module=aset">
						<i class="icon-suitcase"></i>
						<span>Asset</span>
					</a>  									
				</li>   
				<li class="active dropdown"><a href="?module=pengadaan"><i class="icon-archive"></i><span>Pengadaan</span></a></li> 	
				<li class="active dropdown"><a href="?module=pengadaandetail"><i class="icon-list"></i><span>Pengadaan Detail</span></a></li> 
				<li class="active dropdown"><a href="?module=disposal"><i class="icon-trash"></i><span>Disposal</span></a></li> 	
				<li class="active dropdown"><a href="?module=disposaldetail"><i class="icon-check"></i><span>Disposal Detail</span></a></li> 
				<li class="active dropdown"><a href="?module=supplier"><i class="icon-bell"></i><span>Supplier</span></a></li> 	
				<li class="active dropdown"><a href="?module=rekanan"><i class="icon-book"></i><span>Rekanan</span></a></li> 	
				<li class="active dropdown"><a href="?module=users"><i class="icon-user"></i><span>Users</span></a></li> 				
				<li class="active dropdown">					
					<a href="peta3.php" target="_blank">
						<i class="icon-cloud"></i><span>Peta Damkar Kota Bekasi</span><b class="caret"></b>
					</a>  									
				</li>				
			</ul>
		</div> 
	</div> 
</div> -->
    
 <?php
 include("content.php");
 ?>
 
<!-- <div class="extra">
	<div class="extra-inner">
		<div class="container">
			<div class="row">
				<div class="span3">
					<h4>LINK</h4>
					<ul>
						<li><a href="javascript:;">EGrappler.com</a></li>
						<li><a href="javascript:;">Web Development Resources</a></li>
						<li><a href="javascript:;">Responsive HTML5 Portfolio Templates</a></li>
						<li><a href="javascript:;">Free Resources and Scripts</a></li>
					</ul>
				</div> -->
				<!-- /span3 -->
				<!-- <div class="span3">
					<h4>DUKUNGAN</h4>
					<ul>
						<li><a href="javascript:;">Frequently Asked Questions</a></li>
						<li><a href="javascript:;">Ask a Question</a></li>
						<li><a href="javascript:;">Feedback</a></li>
					</ul>
				</div> -->
				<!-- /span3 -->
				<!-- <div class="span3">
					<h4>ASPEK LEGAL</h4>
					<ul>
						<li><a href="javascript:;">Read License</a></li>
						<li><a href="javascript:;">Terms of Use</a></li>
						<li><a href="javascript:;">Privacy Policy</a></li>
					</ul>
				</div> -->
				<!-- /span3 -->
				<!-- <div class="span3">
					<h4>SOFTWARE</h4>
					<ul>
						<li><a href="">Open Source jQuery Plugins</a></li>
						<li><a href="">Free Contact Form Plugin</a></li>
						<li><a href="">Flat UI PSD</a></li>
					</ul>
				</div> -->
				<!-- /span3 -->
		<!--	</div>  /row -->
		<!-- </div>  /container -->
	<!--</div>  /extra-inner -->
<!--</div>  /extra -->
       
<div class="footer">	
	<div class="footer-inner">		
		<div class="container">			
			<div class="row">				
    			<div class="span12">
    				&copy; 2020 <a href="#">Desiana Rizal</a>.
    			</div> <!-- /span12 -->
    		</div> <!-- /row -->
		</div> <!-- /container -->
	</div> <!-- /footer-inner -->
</div> <!-- /footer -->   
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php
}
}
?>