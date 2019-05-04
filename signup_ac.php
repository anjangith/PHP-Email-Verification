<?php
require 'mailer/src/PHPMailer.php';
require 'mailer/src/OAuth.php';
require 'mailer/src/Exception.php';
require 'mailer/src/POP3.php';
require 'mailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;



include('config.php');
$mail = new PHPMailer;
// table name
$tbl_name='temp_members_db';

// Random confirmation code
$confirm_code=md5(uniqid(rand()));

// values sent from form
$name=$_POST['name'];
$email=$_POST['email'];
$country=$_POST['country'];

// Insert data into database
$sql="INSERT INTO $tbl_name(confirm_code, name, email, password, country)VALUES('$confirm_code', '$name', '$email', '$password', '$country')";
$result=mysqli_query($con,$sql);

// if suceesfully inserted data into database, send confirmation link to email
if($result){

// ---------------- SEND MAIL FORM ----------------


// send e-mail to ...
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: your name <your email>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://localhost/VerificationEmail/confirmation.php?passkey=$confirm_code";


// send email
$mail->setFrom('as273863@gmail.com', 'Anjan');
$mail->addAddress($email, 'My Friend');
$mail->Subject  = $subject;
$mail->Body     = $message;
$mail->SMTPDebug=2;
$mail->isHTML(true);

$mail->IsSMTP();
$mail->Host = "ssl://smtp.gmail.com";
$mail->SMTPSecure = 'ssl';

// optional
// used only when SMTP requires authentication  
$mail->SMTPAuth = true;
$mail->Username = 'as273863@gmail.com';
$mail->Password = 'anjanfake';
//$mail->SMTPDebug = 1;
$mail->Port = "465";

if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
}


// if not found
else {
echo "Not found your email in our database";
}


// if your email succesfully sent


?>
