<?php
include ('../../../connect.php');

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5(md5($_POST['password']));
$cp = $_POST['hp'];
$address = $_POST['address'];
$role = $_POST['role'];
$emailadd = $_POST['email'];

    $query = "insert into admin (username, password, hp, address, name, email) values ('".$username."','".$password."','".$cp."','".$address."','".$nama."','".$emailadd."')";

    $cek = mysqli_query($conn, $query);

  $token = date("Ymdhi").$username;
$homepage = file_get_contents("http://localhost/hotel_padang1/mailtemplate.php?token=$token&user=$username");

  if($cek)
  {
    require '../../PHPMailer/class.phpmailer.php';

    $mail = new PHPMailer(); // create a new object
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;

    // But you can comment from here
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->CharSet = "UTF-8";
    // To here. 'cause default secure is TLS.

    $mail->setFrom("auliarizkaa98@gmail.com", "Sistem Informasi Pariwisata Halal Hotel");
    $mail->Username = "auliarizkaa98@gmail.com";
    $mail->Password = "Auliaaa98!";

    $mail->Subject = "Sistem Informasi Pariwisata Halal Hotel";

    $mail->addAddress("$emailadd", "$nama");
    $mail->msgHTML($homepage);

   if (!$mail->send()) {

  $mail->ErrorInfo;
  } else {
    header('location:http://localhost/hotel_padang1/hotel/admin/checkemailjo.php');
  }

  }
  else{
    echo "ERROR";
  }
?>
