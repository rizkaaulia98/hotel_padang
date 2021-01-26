<?php
session_start();
include ('../../../connect.php');
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5(md5($_POST['password']));
$cp = $_POST['hp'];
$address = $_POST['address'];
$role = $_POST['role'];
$emailadd = $_POST['email'];


$uname = mysqli_num_rows(mysqli_query($conn, "SELECT * from admin where username='$username'"));
// $maile = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin WHERE email = '$emailadd'"));
if($uname > 0)
{
  echo "<script>alert ('This username has used by another user, try another username ');
        eval(\"parent.location='../pages/register.php '\");</script>";
}
else
{


    $query = "insert into admin (username, password, hp, address, name, email, role) values ('".$username."','".$password."','".$cp."','".$address."','".$nama."','".$emailadd."','".$role."')";

    $cek = mysqli_query($conn, $query);

  $token = date("Ymdhi").$username;
  $_SESSION['token']=$token;
  $_SESSION['user']=$username;
$homepage = file_get_contents("../../../mailtemplate.php");

  if($cek)
  {
    require '../../../PHPMailer/class.phpmailer.php';

    $mail = new PHPMailer(); // create a new object
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "auliarizkaa98@gmail.com";
    $mail->Password = "Auliaaa98!";

    // But you can comment from here
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->CharSet = "UTF-8";

    // To here. 'cause default secure is TLS.
  //nama pengirim
    $mail->setFrom("auliarizkaa98@gmail.com", "Rizka Aulia");


  //nama penerima
    $mail->Subject = "Verification For New User Of SIPH Hotel";

    $mail->addAddress("$emailadd", "$nama");
    $mail->msgHTML("<!DOCTYPE html>
<html>
<head>
  <title>Verification</title>
  <style>
    #container{
      width: 800px;
      margin: 0 auto;
      height: 100px;
    }
    #header{
      background-color: grey;
      color: white;
      text-align: center
    }
    #badan{
      font-family: arial;
    }
    #kaki{
      margin-top:10px;
      background-color: grey;
      color: white;
      text-align: center;
    }
  </style>
</head>
<body>
  <div id='container'>
    <div id='header'>
      <h2>Email Verification SIPH Hotel</h2>
    </div>
    <div id='badan'>
      <p>Click the link below to verify your account</p>
      <a href='https://gissurya.org/hotel_bkt/admin/pages/verifikasi.php?token=$token&user=$username'>Click on this link to confirm your email</a> <!-- EDIT UNTUK HOSTING -->
    </div>
    <div id='kaki'>
      <h3>Have A Nice Day, $username !</h3>
    </div>
  </div>
</body>
</html>");

if (!$mail->send()) {
       $mail->ErrorInfo;
     }
     else {
         ?>
           <script src="../../assets/js/jquery-1.8.3.min.js"></script>
           <script type="text/javascript">
             $( document ).ready(function() {
                 window.location = "../checkemailjo.php";
             })
           </script>
         <?php
     }
   }
   else{
     echo "gagal";
   }
 }
?>
