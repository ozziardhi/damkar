    <?php
    require_once 'koneksi.php';
      function pesan($msg,$url){
        echo "<script>window.alert('$msg');window.location=('$url');</script>";
      }
      
      $latitude = $_GET['lat'];
      $longitude = $_GET['lng'];
      $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      $query = "INSERT INTO lokasi (latitude,longitude) VALUES ('$latitude','$longitude')";
      
      if ($db->query($query)) {
        pesan("berhasil menyimpan data marker","marker_map.php");
      }else{
        pesan("gagal menyimpan data marker","marker_map.php");
      } 
    ?>