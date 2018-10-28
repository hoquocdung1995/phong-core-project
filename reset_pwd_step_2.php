<?php
session_start();
include 'controllers/functionsUtils.php';

if(isset($_SESSION['username']) && !empty($_SESSION['username']) && isset($_SESSION['retriev_pass'])) {
    header("Location: administrator.php"); /* Redirect browser */
    exit();
}

$msg = '';

if (isset($_POST['reset'])) {
    if (checkVerifyCode($_POST['verifyCode'], $_SESSION['forgot_email'])) {
        header("Location: reset_pwd_step_3.php");
    } else {
        $msg = 'Verify Code incorrect!';
    }
} else if (isset($_POST['resend'])) {
    $verifyCode = getToken();
    attachVerifyCode($verifyCode, $_SESSION['forgot_email']);
    sendEmailToUser($_SESSION['forgot_email'], '[Core-Project] Reset Password code', $verifyCode);
    header("Location: reset_pwd_step_2.php");
} else if (isset($_POST['exit'])) {
    removeVerifyCode($_SESSION['forgot_email']);
    unset($_SESSION['forgot_email']); // destroy this attribute.
    header("Location: log_in.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Verify Code From Your Email
					</span>

                <div class="wrap-input100 validate-input" data-validate="Enter verify code">
                    <input class="input100" type="text" name="verifyCode" placeholder="Verify Code">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <h4 class="txt1" style="text-align: center; color: red"><?php echo $msg; ?></h4>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="reset">
                        Reset
                    </button>&nbsp
                    <button class="login100-form-btn" name="resend">
                        Resend
                    </button>&nbsp
                    <button class="login100-form-btn" name="exit">
                        Exit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>