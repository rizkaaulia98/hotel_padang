<?php
include ('../../../connect.php');
$type = $_POST['type'];
$city = $_POST['city'];
$hotel = $_POST['hotel'];

$id=$city.$type;
$status=$id;

$sql = mysqli_query($conn, "UPDATE hotel set status='$status' where id='$hotel'");
if ($sql){
 echo "<script>alert ('Data Successfully Updated');</script>";
}else{
 echo "<script>alert ('Error');</script>";
}
echo "<script>eval(\"parent.location='../index.php?page=setRecommendation'\");</script>";
?>
