<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dinas Pemadam Kebakaran Kota Bekasi</title>   
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
				<img src='img/logodamkar.jpg' height='50'> DAMKAR KOTA BEKASI
			</a>					
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Account
							<b class="caret"></b>
						</a>						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Settings</a></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>						
					</li>			
					<li class="dropdown">						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							<?php echo "danie"; ?>
							<b class="caret"></b>
						</a>						
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Profile</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>						
					</li>
				</ul>			

								
			</div><!--/.nav-collapse -->		
		</div> <!-- /container -->		
	</div> <!-- /navbar-inner -->	
</div> <!-- /navbar -->
      
<div class="subnavbar">
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
					<a href="media.php?module=pengaduan">
						<i class="icon-truck"></i>
						<span>Absen Masuk</span>
					</a>    				
				</li>				
				<li class="active dropdown">					
					<a href="media.php?module=user">
						<i class="icon-facetime-video"></i>
						<span>User Regiter</span>
					</a>  									
				</li>                               
				<li class="active dropdown">					
					<a href="peta2.php">
						<i class="icon-bar-chart"></i>
						<span>Peta User</span>
					</a>  									
				</li> 	
			</ul>
		</div> <!-- /container -->	
	</div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->