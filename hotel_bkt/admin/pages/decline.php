<?php
$idR = $_GET['id_reservasi'];
$stat = $_GET['status'];
$id_hotel = $_GET['id_hotel'];

$update = "UPDATE reservasi set status='3' where id_reservasi='$idR'";
$sql = mysqli_query($conn, $update);

if ($sql) {
  echo "<script>alert ('Request Successfully Declined');
	eval(\"parent.location='../indexu.php?page=transaction&id=$id_hotel'\");
	</script>";
}else{
  echo "<script>alert ('Failed');
  eval(\"parent.location='../indexu.php?page=transaction&id=$id_hotel'\");
  </script>";
}
?>
