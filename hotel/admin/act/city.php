<?php
require '../../../connect.php';
	session_start();
	$pilihan = $_POST['pilihan'];
	$city 	 = $_POST['city'];

	$sql = mysqli_query($conn, "SELECT * FROM city WHERE id = '$city'");

	$row  = mysqli_fetch_array($sql);
	$_SESSION['id']   = $row['id'];
	$_SESSION['name'] = $row['name'];

		echo "<script>eval(\"parent.location='../index.php? '\"); </script>";

?>
