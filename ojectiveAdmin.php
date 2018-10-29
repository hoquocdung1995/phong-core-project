<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
 //include('connection.php');
?>
<html>
<head>
	<title>Administartor</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/style.css">
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
						<img src="http://www.webhostingreviewsbynerds.com/wp-content/plugins/rss-poster/cache/e17b1_fnal-570x456.png" width="32" height="32" >
					</span>
                    <a class="selected" href="admin.php">Dashboard</a>
                </li>
                <li>
                    <span>
						<img src="http://www.webhostingreviewsbynerds.com/wp-content/plugins/rss-poster/cache/e17b1_fnal-570x456.png" width="32" height="32" >
					</span>
					<a href="#">Ojective</a>
                </li>
                <li>
                    <span>
						<img src="http://www.webhostingreviewsbynerds.com/wp-content/plugins/rss-poster/cache/e17b1_fnal-570x456.png" width="32" height="32" >
					</span>
					<a href="#">Skills</a>
                </li>
            </ul>
        </div>
		
		<div class="content">
			<form action="" method="post">
				<textarea name="ckeditor" class="ckeditor"></textarea>
				<br>
				<input type="submit" value="    Save    ">
			</form>
		</div>
    </div>
    <!-- #container -->

</body>
</html>

