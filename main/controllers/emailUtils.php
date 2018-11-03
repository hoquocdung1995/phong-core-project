<?php
/**
 * Created by PhpStorm.
 * User: PHATNB
 * Date: 28/10/2018
 * Time: 16:22 PM
 */

function sendEmailToUser($emailTo, $subject, $verifyCode)
{
    $message = "
                <html>
                    <head>
                        <title>Reset Password Verify Code</title>
                    </head>
                    <body>
                        <p style='text-align: center'>Your verify code is below</p>
                        <p style='text-align: center'><h1>$verifyCode</h1></p>
                    </body>
                </html>
";

// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= 'From: <phatnb93@gmail.com>' . "\r\n";
    $headers .= 'Cc: myboss@example.com' . "\r\n";

    mail($emailTo, $subject, $message, $headers);
}
?>