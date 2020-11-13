<?php
include ('../../../connect.php'); 

$query = mysqli_query($conn, "SELECT MAX(id_type) AS id_type FROM room");
$result = mysqli_fetch_array($query);
$idmax = $result['id_type'];
if ($idmax==null) {$idmax=1;}
else {$idmax++;}

$roomtype = $_POST['roomtype'];
$count = count($roomtype);
$sql  = "insert into room (id_type, name) VALUES ";

for( $i=0; $i < $count; $i++ ){
	$sql .= "('{$idmax}','{$roomtype[$i]}')";
	$sql .= ",";
	$idmax++;
}
$sql = rtrim($sql,",");
$insert = mysqli_query($conn, $sql);

if ($sql){
	echo "<script>
	alert ('Data Successfully Added');
	</script>";
}else{
	echo "<script>
	alert ('Error');
	</script>";
}

	echo "<script>
	eval(\"parent.location='../index.php?page=roomtype'\");
	</script>";
?>
