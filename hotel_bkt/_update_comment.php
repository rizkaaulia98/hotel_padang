<?php

include '../connect.php';

    $id = $_GET['id'];
		$id_review = $_GET['id_review'];
		$rating = $_GET['rateids'];
    $comment = $_GET['comment'];
		$nama = $_GET['nama'];

		$tanggal = date("Y-m-d");

		$sql = "";
		//echo strpos($id,"RMasd");

		if(strpos($id,"HT") !== false)
		{
			$sql = "UPDATE review set comment='$comment',rating='$rating', name='$nama' where id_review='$id_review'";
		}
		// var_dump($sql); die();
		$query_sql = mysqli_query($conn, $sql);

		if($query_sql){
			echo "<script>alert ('Review Was Updated');</script>";
		}else{
			echo "<script>alert ('Ooops, Failed to Update');</script>";
		}

		echo "<script>
			eval(\"parent.location='gallery.php?idgallery=$id'\");
			</script>";



?>
