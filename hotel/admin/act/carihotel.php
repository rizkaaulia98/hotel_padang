<?php
include('../../../connect.php');

$city = $_POST["city"];

if ($_POST['city']=="P") {
  $tampil=mysqli_query($conn,"SELECT * FROM hotel WHERE id like 'HT0%'");
}else if($_POST['city']=="B"){
  $tampil=mysqli_query($conn,"SELECT * FROM hotel WHERE id like 'H0%'");
}

$jml=mysqli_num_rows($tampil);
if($jml > 0){
echo"
<option selected>- Select Hotel -</option>";
while($r=mysqli_fetch_array($tampil)){
echo "<option value=$r[id]>$r[name]</option>";
}
}else{
echo "
<option selected>- No Hotel Records -</option>";
}
?>
