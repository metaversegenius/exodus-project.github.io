<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>

<title>EXODUS MAIL SERVICE</title>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8">

</head>

<body>

<?php 

$honeypot = FALSE;
if (!empty($_REQUEST['contact_me_by_fax_only']) && (bool) $_REQUEST['contact_me_by_fax_only'] == TRUE) {
    $honeypot = TRUE;
    log_spambot($_REQUEST);
    # treat as spambot
       exit();  // all done if a spambot
} else {
    # process as normal


			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$comment = $_POST['comment'];

			$for ='contact@exodus.io' ;
			$tittle = 'Exodus Web Form';
			$header = 'From: ' . $email;
			$msjCorreo =  "<b>Name:</b> $firstname $lastname\n   <b>E-Mail:</b> $email\n   <b>Comment:</b> $comment\n";
			if ($_POST['submit']) {
			if (mail($for, $tittle, $msjCorreo, $header)) {
			echo "<script language='javascript'>
			window.location.href = 'http://exodus.io/thanks.html';
			</script>";
			} else {
			echo 'Something go wrong Sending Error';
			}
			}

}

?>