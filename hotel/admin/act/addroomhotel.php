<?php
include ('../../../connect.php');
$id = $_POST['id_hotel'];
$query = mysqli_query($conn, "SELECT MAX(id_room) AS id_max FROM detail_room");
$result = mysqli_fetch_array($query);
$idmax = $result['id_max'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}
$idmax2 = $idmax;

$room = $_POST['nama_kamar'];
$tipe = $_POST['tipe_kamar'];
$harga = $_POST['harga_kamar'];
$available = $_POST['kamar_available'];
$kamarsisa = $_POST['kamar_sisa'];

$sql = "INSERT into detail_room (id_room, id_hotel, name, price, id_type, available, sisa) values ('$idmax','$id','$room','$harga','$tipe','$available','$kamarsisa')";
$insert = mysqli_query($conn, $sql);

if ($insert){
		echo "<script>
		alert (' Data Successfully Added');
		eval(\"parent.location='../indexu.php?page=hotel_owner&id=$id'\");
		</script>";
}else{
	echo 'error';
}


// $room = $_POST['room'];
// $price = $_POST['roomprice'];
//
// $count = count($room);
// // $sql  = "insert into room (id, name, price) VALUES ";
// //
// // for( $i=0; $i < $count; $i++ ){
// // 	$sql .= "('{$idmax}','{$room[$i]}','{$price[$i]}')";
// // 	$sql .= ",";
// // 	$idmax++;
// // }
// // $sql = rtrim($sql,",");
// // $insert = mysqli_query($conn, $sql);
//
// $sql2 = "insert into detail_room (id_room, id_hotel, name, price) VALUES ";
// for( $x=0; $x< $count; $x++ ){
// 	$sql2 .= "('{$idmax2}','{$id}','{$room}','{$price}')";
// 	$sql2 .= ",";
// 	$idmax2++;
// }
// $sql2 = rtrim($sql2,",");
// $insert2 = mysqli_query($conn, $sql2);
//
//
// if ($sql2){
// 		echo "<script>
// 		alert (' Data Successfully Added');
// 		eval(\"parent.location='../index.php?page=formsetR&id=$id '\");
// 		</script>";
// }else{
// 	echo 'error';
// }


?>
