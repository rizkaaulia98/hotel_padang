<script async src="https://www.googletagmanager.com/gtag/js?id=UA-180188427-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-180188427-1');
</script>
<?php
include '../connect.php';
session_start();
$id = $_POST['id'];
$username = $_SESSION['username'];
$room = $_POST['room'];
$jumlah = $_POST['jumlah'];
$datein = $_POST['datein'];
$dateout = $_POST['dateout'];
$tanggal = date("Y-m-d");

$cariMax = "select max(id_reservasi) as max from reservasi";
$queryMax = mysqli_query($conn, $cariMax);
$dataMax = mysqli_fetch_array($queryMax);

$id_reservasi = 0;
if($dataMax['max'] == null){
	$id_reservasi = 1;
} else {
	$id_reservasi = $dataMax['max'] + 1;
}

echo $username;
$insert = "INSERT into reservasi (id_reservasi, id_hotel, username, id_room, jumlah, datein, dateout, tgl, status) values('$id_reservasi', '$id', '$username', '$room', '$jumlah', '$datein', '$dateout', '$tanggal', '1')";
$query = mysqli_query($conn, $insert);

if($query){
  if ($_SESSION['C']==true) {
    echo "<script>alert ('A room has successfully booked!');
    eval(\"parent.location='transaction.php?username=$username'\");
    </script>";
  }
}else{
	echo "<script>alert ('Reservation failed!');
  eval(\"parent.location='transaction.php?username=$username'\");
  </script>";

}


?>
