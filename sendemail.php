<?php

// Define some constants
 // define( "RECIPIENT_NAME", "diksha" );
 // define( "RECIPIENT_EMAIL", "diksha32@live.com" );

// Read the form values
$success = false;
$senderName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $phone && $message) {
 // $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
	$recipient = "shefali@textimz.com";
  $headers = "From: " .$senderEmail;
  $msgBody = " Phone: " . $phone . " Message: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );
  echo $recipient." ".$headers." ".$msgBody;
  //Set Location After Successsfull Submission
  //echo "<script type='text/javascript'> alert('working'); </script>";
  header('Location: contact.php');

}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.php');	
  	echo "<script type='text/javascript'> alert('not working'); </script>";

}

?>

<?php
// $to = "somebody@example.com";
// $subject = "My subject";
// $txt = "Hello world!";
// $headers = "From: webmaster@example.com" . "\r\n" .
// "CC: somebodyelse@example.com";

// mail($to,$subject,$txt,$headers);
?>