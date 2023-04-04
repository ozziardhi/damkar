<?php
include "koneksi.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
	 $username = $_POST['email'];
	 $password = $_POST['password'];
	
	if (empty($username)){
		echo json_encode("Username atau password belum diisi");
		return;
	}	

	 //Creating sql query
	 $sql = "SELECT * FROM users WHERE email='$username' AND password='$password'";

	 //executing query
	 $result = mysqli_query($koneksi,$sql);

	 //fetching result
	 $check = mysqli_fetch_array($result);

	 //if we got some result
 if(isset($check)){
	 //displaying success
	 echo "success";
	}
	else{
 //displaying failure
 echo "failure";
 }
 mysqli_close($con);
}
?>