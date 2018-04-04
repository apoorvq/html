<?php

if (isset($_POST['email'])) 
{
	include "config.php";
	$email= $_POST['email'];
	$time = date('Y-m-d H:i:s');
        //ip_address
    $ip=getenv('HTTP_CLIENT_IP')?:
 	    getenv('HTTP_X_FORWARDED_FOR')?:
	    getenv('HTTP_X_FORWARDED')?:
	    getenv('HTTP_FORWARDED_FOR')?:
	    getenv('HTTP_FORWARDED')?:
	    getenv('REMOTE_ADDR');
	    //echo $email." ".$time." ".$ip;

        $stmt = $conn->prepare("INSERT INTO subscriber (subscriberEmail, dateTimeStamp, UserIP) VALUES (:email, :time, :ip)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':time', $time);
        $stmt->bindParam(':ip', $ip);
        // insert a row
        //$fkid = $uid['pk_i_id'];
        
        $stmt->execute();
        //echo $stmt;
        
        header('Location: ./index.php');
}

?>