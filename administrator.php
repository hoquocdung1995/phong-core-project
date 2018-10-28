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
}
?>

<html>
<body>
hello there
<form method="post">
<button name="logout">
    Logout
</button></form>
</body>
</html>