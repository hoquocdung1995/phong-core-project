<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
include('Controller/Connection/connection.php');

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

    mail($to, $subject, $txt, $headers);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Administartor</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="js/index.js"></script>
</head>
<body>
<div id="header">
    <div class="logo">
        <a href="#">Administartor</a>
    </div>
</div>
<a class="mobile">MENU</a>
<div id="container">
    <div class="sidebar">
        <ul id="nav">
            <li>
                    <span>
						<img src="http://www.webhostingreviewsbynerds.com/wp-content/plugins/rss-poster/cache/e17b1_fnal-570x456.png" width="32" height="32">
					</span>
                <a class="selected" href="admin.php">Dashboard</a>
            </li>
            <li>
                    <span>
						<img src="http://www.webhostingreviewsbynerds.com/wp-content/plugins/rss-poster/cache/e17b1_fnal-570x456.png" width="32" height="32" >
					</span>
                <a href="OjectAdmin.php">Ojective</a>
            </li>
            <li>
                    <span>
						<img src="http://www.webhostingreviewsbynerds.com/wp-content/plugins/rss-poster/cache/e17b1_fnal-570x456.png" width="32" height="32" >
					</span>
                <a href="SkillAdmin.php">Skills</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <h1>Dashboard</h1>
        <p>Here you can do stuff</p>
        <div id="box">
            <div class="box-top">News</div>
            <div class="box-panel">Lorem nes stuf</div>
        </div>

        <div id="box">
            <div class="box-top">News</div>
            <div class="box-panel">Lorem nes stuf</div>
        </div>

        <div id="box">
            <div class="box-top">News</div>
            <div class="box-panel">Lorem nes stuf</div>
        </div>
        <form method="post">
            <button name="logout">
                Logout
            </button></form>
    </div>
</div>
<!-- #container -->

</body>
</html