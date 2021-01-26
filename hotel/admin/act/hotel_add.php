 <?php
include ('../../../connect.php');
$id = $_POST['id'];
$nama = $_POST['name'];
$address = $_POST['address'];
$cp = $_POST['cp'];
$type = $_POST['type'];
$mushalla = $_POST['mushalla'];
$geom = $_POST['geom'];
$access= $_POST['access'];

$ktp = $_POST['ktp'];
$marriage_book = $_POST['marriage_book'];
if ($ktp != 1) {
	$ktp=0;
}
if ($marriage_book != 1) {
	$marriage_book=0;
}
$sql = mysqli_query($conn, "INSERT into hotel (id, access, name, address, cp, geom, ktp, marriage_book, mushalla, id_type) values ('$id', '$access', '$nama', '$address', '$cp', ST_GeomFromText('$geom'), '$ktp', '$marriage_book', '$mushalla', '$type')");
echo mysqli_error($sql);
if ($sql){
	echo "<script>alert ('Data Successfully Added');</script>";
}else{
	echo "<script>alert ('Error');</script>";
}
echo "<script>eval(\"parent.location='../index.php?page=hotel_add'\");</script>";

?>
