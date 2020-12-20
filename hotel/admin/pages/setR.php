<?php
$id = $_GET['idH'];
$st = $_GET['st'];

$hotel = mysqli_query($conn,"SELECT * from hotel where id='$id'");
$data = mysqli_fetch_array($hotel);

$sql = mysqli_query($conn, "UPDATE hotel set status='$st' where id='$id'");
if ($sql) {
  echo "<script>alert ('Hotel successfully graded!');
	</script>";
}else {
  echo "<script>alert ('Failed');</script>";
}
echo "<script>eval(\"parent.location='index.php?page=recommendation'\");</script>"

?>
