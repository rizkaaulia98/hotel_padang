<?php
include ('../../../connect.php');
$category = $_POST['category'];
$hotel = $_POST['hotel'];
$grade = $_POST['grade'];


$sql = mysqli_query($conn, "INSERT INTO hotel_recommendation(id_hotel, id_kategori,grade)
VALUES ('$hotel', '$category', '$grade')");
if ($sql){
 echo "<script>alert ('Data Successfully Added');</script>";
}else{
 echo "<script>alert ('Error');</script>";
}
echo "<script>eval(\"parent.location='../index.php?page=setRecommendation'\");</script>";
?>
