<?php

include '../connect.php';


		include '../connect.php';

		$id = $_POST['id'];
		$rating = $_POST['rateid'];
		$nama = $_POST['nama'];
		$comment = $_POST['comment'];

		$cariMax = "SELECT max(id_review) AS max FROM review";
		$queryMax = mysqli_query($conn, $cariMax);
		$dataMax = mysqli_fetch_array($queryMax);

		$id_review = 0;

		if($dataMax['max'] == null)
		{
			$id_review = 1;
		}
		else
		{
			$id_review = $dataMax['max'] + 1;
		}

		$tanggal = date("Y-m-d");

		$sql = "";
		//echo strpos($id,"RMasd");

		// Cek username di database
		$cek_username=mysqli_num_rows(mysqli_query
             ($conn, "SELECT name FROM review
               WHERE name='$nama'"));
		 // Kalau username sudah ada yang pakai
		if ($cek_username > 0){
  echo "<script>alert ('You Had Reviewed This Hotel');</script>";
	echo "<script>
		eval(\"parent.location='gallery.php?idgallery=$id'\");
		</script>";
		}
// Kalau username valid, inputkan data ke tabel users
		else{

		if(strpos($id,"HT") !== false)
		{
			$sql = "INSERT INTO review(name,id_hotel,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
		}
		else if(strpos($id,"SO") !== false)
		{
			$sql = "INSERT INTO review(name,id_souvenir,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
		}
		else if(strpos($id,"IK") !== false)
		{
			$sql = "INSERT INTO review(name,id_ik,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
		}
		else if(strpos($id,"RM") !== false)
		{
			$sql = "INSERT INTO review(name,id_kuliner,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
		}
		else if(strpos($id,"TM") !== false)
		{
			$sql = "INSERT INTO review(name,id_ow,comment,tanggal,id_review, rating) VALUES('$nama','$id','$comment','$tanggal','$id_review', '$rating')";
		}

		// var_dump($sql); die();
		$query_sql = mysqli_query($conn, $sql);

		if($query_sql){
			echo "<script>alert ('Review Was Added');</script>";
		}else{
			echo "<script>alert ('Ooops, Fields Must Not be Empty !');</script>";
		}

		echo "<script>
			eval(\"parent.location='gallery.php?idgallery=$id'\");
			</script>";

}

// $id = $_POST['id'];
// $nama = $_POST['nama'];
// $comment = $_POST['comment'];
//
// $cariMax = "select max(id_review) as max from review";
// $queryMax = mysqli_query($conn, $cariMax);
// $dataMax = mysqli_fetch_array($queryMax);
//
// $id_review = 0;
// if($dataMax['max'] == null){
// 	$id_review = 1;
// } else {
// 	$id_review = $dataMax['max'] + 1;
// }
//
// $tanggal = date("Y-m-d");
//
// $sql = "";
// //echo strpos($id,"RMasd");
// if(strpos($id,"H") !== false){
// 	$sql = "insert into review(name,id_hotel,comment,tanggal,id_review) values('$nama','$id','$comment','$tanggal','$id_review')";
// } else if(strpos($id,"SO") !== false){
// 	$sql = "insert into review(name,id_souvenir,comment,tanggal,id_review) values('$nama','$id','$comment','$tanggal','$id_review')";
// } else if(strpos($id,"IK") !== false){
// 	$sql = "insert into review(name,id_ik,comment,tanggal,id_review) values('$nama','$id','$comment','$tanggal','$id_review')";
// } else if(strpos($id,"RM") !== false){
// 	$sql = "insert into review(name,id_kuliner,comment,tanggal,id_review) values('$nama','$id','$comment','$tanggal','$id_review')";
// } else if(strpos($id,"tw") !== false){
// 	$sql = "insert into review(name,id_ow,comment,tanggal,id_review) values('$nama','$id','$comment','$tanggal','$id_review')";
// }
//
// $query_sql = mysqli_query($conn, $sql);
// if($query_sql){
// 	echo "<script>alert ('Data Successfully Added');</script>";
// 	header("location:gallery.php?idgallery=$id");
// }else{
// 	echo "<script>alert ('Error');</script>";
// 	header("location:gallery.php?idgallery=$id");
// }

// echo "<script>
// 	eval(\"parent.location='gallery.php?idgallery=$id'\");
// 	</script>";

?>
