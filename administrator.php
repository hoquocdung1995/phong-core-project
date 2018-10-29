<?php 
session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	header("Location: log_in.php"); /* Redirect browser */
	exit();
}

if(isset($_POST['logout'])) {
    session_destroy();
    header("Location: log_in.php");
    exit();
} else if (isset($_POST['sendMail'])) {
	$to = "phatnb93@gmail.com";
	$subject = "[Core-project] Reset verify code";
	$txt = "12345678";
	$headers = "From: phong-core-project@pcp.com" . "\r\n" .
		"CC: somebodyelse@example.com";

	mail($to,$subject,$txt,$headers);
}
?>

<html>
<body>
hello there
<form method="post">
<button name="logout">
    Logout
</button>
<button name="sendMail">
    Send Email
</button></form>
</body>
</html>