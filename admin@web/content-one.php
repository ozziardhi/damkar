<?php
 $full_name = $_SERVER['REQUEST_URI'];
        $name_array = explode('/',$full_name);
        $count = count($name_array);
        $page_name = $name_array[$count-1];
        $name_array1= explode('?',$page_name);
        $count1 = count($name_array1);
        $page_name1 = $name_array1[$count1-1];
        
include "../config/koneksi.php";
 

if ($_SESSION['leveluser']=='admin'){
	
  $sql=mysqli_query($koneksi,"select * from menuutama where aktif='Y' AND lokasi='Admin' order by urutan");?>
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
       <!-- <li class="active dropdown">          
          <a href="?module=cabang">
            <i class="icon-building"></i>
            <span>Cabang</span>
          </a>                    
        </li>   -->
        <li class=" active dropdown">           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-suitcase"></i>
              Master
             
            </a>            
            <ul class="dropdown-menu">
              <li><a href="?module=aset">Master Aset</a></li>
              <li><a href="?module=masterbarang">Master Barang</a></li>
               <li><a href="?module=cabang">Master Cabang</a></li>
                <li><a href="?module=rekanan">Master Rekanan</a></li>
                 <li><a href="?module=supplier">Master Supplier</a></li>
            </ul>           
          </li>   
        <!--<li class="active dropdown">          
          <a href="?module=aset">
            <i class="icon-suitcase"></i>
            <span>Asset</span>
          </a>                   
        </li>   -->
        <li class="active dropdown"><a href="?module=pengadaan"><i class="icon-archive"></i><span>Pengadaan</span></a></li>   
        <li class="active dropdown"><a href="?module=pengadaandetail"><i class="icon-list"></i><span>Pengadaan Detail</span></a></li> 
        <li class="active dropdown"><a href="?module=disposal"><i class="icon-trash"></i><span>Disposal</span></a></li>   
        <li class="active dropdown"><a href="?module=disposaldetail"><i class="icon-check"></i><span>Disposal Detail</span></a></li> 
         <li class="active dropdown"><a href="?module=laporan"><i class="icon-flag"></i><span>Laporan</span></a></li> 
        <!--<li class="active dropdown"><a href="?module=supplier"><i class="icon-bell"></i><span>Supplier</span></a></li>  
        <li class="active dropdown"><a href="?module=rekanan"><i class="icon-book"></i><span>Rekanan</span></a></li>  -->
        <li class="active dropdown"><a href="?module=users"><i class="icon-user"></i><span>Users</span></a></li> 
        <li class="active dropdown"><a href="peta3.php"><i class="icon-cloud"></i><span>Peta Aset</span></a></li>        
        <!-- <li class=" active dropdown">           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-cloud"></i>
              Peta
             
            </a>            
            <ul class="dropdown-menu">
              <li><a href="peta4.php">Peta Damkar Kota Bekasi</a></li>
              <li><a href="peta3.php">Peta Aset</a></li>
            </ul>           
          </li>  -->     
      </ul>
    </div> <!-- /container -->  
  </div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->
  <?php 

 
 
  
}
  

elseif ($_SESSION['leveluser']=='user'){
  $sql=mysqli_query($koneksi,"select * from menuutama where hakakses='user' AND lokasi='Admin' order by urutan");?>
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
        <li class="active dropdown"><a href="peta3.php"><i class="icon-cloud"></i><span>Peta Aset</span></a></li>    
        <!--<li class=" active dropdown">           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-cloud"></i>
              Peta
             
            </a>            
            <ul class="dropdown-menu">
              <li><a href="peta4.php">Peta Damkar Kota Bekasi</a></li>
              <li><a href="peta3.php">Peta Aset</a></li>
            </ul>           
          </li>  -->       
      </ul>
    </div> <!-- /container -->  
  </div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->
<?php

} elseif ($_SESSION['leveluser']=='petugas'){
  $sql=mysqli_query($koneksi,"select * from menuutama where hakakses='petugas' AND lokasi='Admin' order by urutan");?>
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
       
        <li class="active dropdown"><a href="peta3.php"><i class="icon-cloud"></i><span>Peta Aset</span></a></li>    
        <!--<li class=" active dropdown">           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-cloud"></i>
              Peta
             
            </a>            
            <ul class="dropdown-menu">
              <li><a href="peta4.php">Peta Damkar Kota Bekasi</a></li>
              <li><a href="peta3.php">Peta Aset</a></li>
            </ul>           
          </li>  -->       
      </ul>
    </div> <!-- /container -->  
  </div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->

<?php } 
elseif ($_SESSION['leveluser']=='kepala'){
  $sql=mysqli_query($koneksi,"select * from menuutama where hakakses='kepala' AND lokasi='Admin' order by urutan");?>
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
          <a href="?module=cabang">
            <i class="icon-building"></i>
            <span>Cabang</span>
          </a>                    
        </li>   
        <li class="active dropdown">          
          <a href="?module=aset">
            <i class="icon-suitcase"></i>
            <span>Aset</span>
          </a>                    
        </li>   
        <li class="active dropdown"><a href="?module=laporan"><i class="icon-flag"></i><span>Laporan</span></a></li> 
        <li class="active dropdown"><a href="peta3.php"><i class="icon-cloud"></i><span>Peta Aset</span></a></li>    
        <!--<li class=" active dropdown">           
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="icon-cloud"></i>
              Peta
             
            </a>            
            <ul class="dropdown-menu">
              <li><a href="peta4.php">Peta Damkar Kota Bekasi</a></li>
              <li><a href="peta3.php">Peta Aset</a></li>
            </ul>           
          </li>  -->       
      </ul>
    </div> <!-- /container -->  
  </div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->
<?php } ?>

	