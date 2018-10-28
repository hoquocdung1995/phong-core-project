<?php
/**
 * Created by PhpStorm.
 * User: PHATNB
 * Date: 28/10/2018
 * Time: 16:54 PM
 */
include 'controllers/databaseUtils.php';

function checkLogin($username, $password)
{
    try {
        $conn = getConnection();
        $sql = "SELECT USERNAME, PASSWORD FROM USERS WHERE USERNAME = '" . $username . "' AND PASSWORD = '" . $password . "' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    } catch (mysqli_sql_exception $exception) {
        echo 'ERROR!' . $exception->getMessage();
    }
}

function checkExistEmail($inputEmail) {
    try {
        $conn = getConnection();
        $sql = "SELECT * FROM USERS WHERE EMAIL = '" . $inputEmail . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    } catch (mysqli_sql_exception $exception) {
        echo 'ERROR!' . $exception->getMessage();
    }
}

function crypto_rand_secure($min, $max) {
    $range = $max - $min;
    if ($range < 0) return $min; // not so random...
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

function getToken($length=8)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, strlen($codeAlphabet))];
    }
    return $token;
}

function attachVerifyCode($verifyCode, $email)
{
    try {
        $conn = getConnection();
        $sql = "UPDATE USERS SET FORGOT_CODE = '" . $verifyCode . "' WHERE EMAIL = '" . $email . "'";

        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    } catch (mysqli_sql_exception $exception) {
        echo 'ERROR!' . $exception->getMessage();
    }
}

function checkVerifyCode($verifyCode, $email)
{
    try {
        $conn = getConnection();
        $sql = "SELECT * FROM USERS WHERE EMAIL = '" . $email . "' AND FORGOT_CODE = '" . $verifyCode . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    } catch (mysqli_sql_exception $exception) {
        echo 'ERROR!' . $exception->getMessage();
    }
}

function removeVerifyCode($email) {
    try {
        $conn = getConnection();
        $sql = "UPDATE USERS SET FORGOT_CODE = NULL WHERE EMAIL = '" . $email . "'";

        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    } catch (mysqli_sql_exception $exception) {
        echo 'ERROR!' . $exception->getMessage();
    }
}

function updatePassword($pass, $email) {
    try {
        $conn = getConnection();
        $sql = "UPDATE USERS SET PASSWORD = '".$pass."' WHERE EMAIL = '" . $email . "'";

        if ($conn->query($sql) === TRUE) {

        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    } catch (mysqli_sql_exception $exception) {
        echo 'ERROR!' . $exception->getMessage();
    }
}
?>