<?php
$idR = $_GET['id_reservasi'];
$stat = $_GET['status'];
$id_hotel = $_GET['id_hotel'];
$id_room = $_GET['id_room'];

$a = mysqli_query($conn, "SELECT reservasi.id_reservasi, reservasi.jumlah as jumlah, detail_room.available
  as available, detail_room.sisa as sisa FROM detail_room right join reservasi
  on detail_room.id_room=reservasi.id_room where detail_room.id_room = '$id_room'");
  $data =  mysqli_fetch_array($a);
  $available = $data['available'];
  $sisa = $data['sisa'];
  $jumlah = $data['jumlah'];
  $sisakamar = ($sisa - $jumlah);

  $kamar = "UPDATE detail_room set sisa='$sisakamar' where id_room='$id_room'";
  $update = "UPDATE reservasi set status='2' where id_reservasi='$idR'";
  $sql = mysqli_query($conn, $update);
  $query = mysqli_query($conn, $kamar);


if ($sql && $query) {
  echo "<script>alert ('Request successfully approved!');
	</script>";
}else{
  echo "<script>alert ('Failed');</script>";
}
echo "<script>eval(\"parent.location='indexu.php?page=transaction&id=$id_hotel'\");</script>"
?>
