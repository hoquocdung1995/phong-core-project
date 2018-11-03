<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
    $_userName = 'dho43';
    include('Controller/Connection/connection.php');
    include('Controller/DAO/skillDAO.php');
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
            <h1>Skills</h1>
            <form action="" method="post">
                <div id="box">
                    <div class="box-top">Java Programming</div>
                    <div class="box-panel">
                        <input type="text" name="java_Skill" value=<?php echo $value_Java; ?>>
                    </div>
                </div>

                <div id="box">
                    <div class="box-top">Database</div>
                    <div class="box-panel">
                        <input type="text" name="databasse_Skill" value=<?php
                        echo htmlentities($value_Data);
                        ?>>
                    </div>
                </div>

                <div id="box">
                    <div class="box-top">System Design</div>
                    <div class="box-panel">
                        <input type="text" name="system_Skill" value=<?php
                        echo htmlentities($value_Sys);
                        ?>>
                    </div>
                </div>
                <br>
                <input type="submit" value="    Save    " name="SAVE">
                <p style="color: #ff2222"><?php
                    echo $status;
                    ?></p>
            </form>
        </div>
</div>
<!-- #container -->

</body>
</html