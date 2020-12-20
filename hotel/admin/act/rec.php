<?php
include ('../../../connect.php');
$query = mysqli_query($conn,"UPDATE hotel SET status = '".$_POST['val']."'  WHERE id = '".$_POST['id']."';");
if($query){
    echo "success";
    $q=mysqli_query($conn,"SELECT * FROM hotel WHERE id='".$_POST['id']."';");
    $data=mysqli_fetch_assoc($q);
    echo $data['status'];
}
?>
