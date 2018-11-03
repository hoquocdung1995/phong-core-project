<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
$_userName = 'dho43';
include('Controller/Connection/connection.php');
include('Controller/DAO/ojectiveDAO.php');
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
        <h1>Ojective</h1>
        <br>
        <form action="" method="post">
                <textarea name="OJECTIVE" class="ckeditor">
                    <?php
                    if ($resultQuery->num_rows > 0) {
                        // output data of each row
                        while($row = $resultQuery->fetch_assoc()) {
                            echo $row["TEXT_INFO"];
                        }
                    }
                    ?>
                </textarea>
            <br>
            <input type="submit" value="    Save    " name="SAVE">
        </form>
    </div>
</div>
<!-- #container -->

</body>
</html