<?php
include ('../connect.php');
$idR = $_GET['id_reservasi'];
$stat = $_GET['status'];
$username = $_GET['username'];

$update = "UPDATE reservasi set status='4' where id_reservasi='$idR'";
$sql = mysqli_query($conn, $update);

if ($sql) {
  echo "<script>alert ('Request Successfully Cancelled');
	eval(\"parent.location='transaction.php?customer=$username'\");
	</script>";
}else{
  echo "<script>alert ('Failed');
  eval(\"parent.location='transaction.php?customer=$username'\");
  </script>";
}
?>
