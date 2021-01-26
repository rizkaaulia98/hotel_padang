<?php
	session_start();
	$_FILES["file_video"]['type'];
	$_FILES["file_video"]["size"];
	include ('../../../connect.php');

	$id = $_POST['id_videos'];


	$querysearch = "SELECT sn FROM hotel_video WHERE id = '$id' ORDER BY sn DESC LIMIT 1";

	$hasil = mysqli_query($conn, $querysearch);
	$sn = 1;

	while($baris = mysqli_fetch_array($hasil))
	{
		$angka = $baris['sn'] + 1;
		$sn = $angka;
	}

	$jenis_video = $_FILES["file_video"]['type'];

	if(($jenis_video=="video/mp4" || $jenis_video=="video/avi" || $jenis_video=="video/mov" || $jenis_video=="video/mkv") && ($_FILES["file_video"]["size"] <= 500000000))
	{
		// $searchvideo = "SELECT video FROM hotel_video WHERE id = '$id'";
		// $cari = mysqli_query($conn, $searchvideo);
		// while($file = mysqli_fetch_array($cari))
		// {
		// 	$filenya = $file['video'];
		// 	$video_file = '../../../_video/'.$filenya;
	  //   unlink($video_file);
		// }
		//
		// $sql_hapus = mysqli_query($conn, "DELETE FROM hotel_video where id = '$id'");
		$sourcename = $_FILES["file_video"]["name"];
		$name = $sourcename;
		$name = $id.$sn.".mp4";
		$filepath = "../../../_video/".$name;
		move_uploaded_file($_FILES["file_video"]["tmp_name"],$filepath);
		$sql = mysqli_query($conn, "INSERT INTO hotel_video(sn, id, video) VALUES('$sn','$id','$name')");
		if($sql){
			echo '<meta http-equiv="REFRESH" content="0.1;url=../indexu.php?page=hotel_owner&id='.$id.'">';
			}
		}
	else{
		echo " The Video Isn't Valid!<br>";
		echo "Go Back To <a href='../indexu.php?page=hotel_owner&id=$id'>Hotel info</a>";
	}
?>
