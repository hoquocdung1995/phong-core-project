<?php
include 'Controller/Connection/connection.php';
$status= "";
$value_Java="";
$value_Data ="";
$value_Sys ="";
$_sqlQuery = "SELECT * FROM SKILLPF WHERE USERNAME = '".$_userName."'";
try{
    $resultQuery = $connection->query($_sqlQuery);
    $row = mysqli_fetch_assoc($resultQuery);
    $value_Java = $row["JAVA_INFO"];
    $value_Data = $row["DATA_INFO"];
    $value_Sys = $row["SYS_INFO"];
} catch (mysqli_sql_exception $e){
    echo '<script language="javascript">';
    echo 'alert("Database error : '.$e.')';
    echo '</script>';
    exit();
}
if(isset($_POST['SAVE'])){
    $_userName = 'dho43';
    $_sqlQuery = "SELECT * FROM SKILLPF WHERE USERNAME = '".$_userName."'";
    $resultQuery = $connection->query($_sqlQuery);
    try{
        $resultQuery = $connection->query($_sqlQuery);
        if($resultQuery){
            $_sqlDelete = "DELETE FROM SKILLPF WHERE USERNAME = '".$_userName."'";
            try{
                $resultDelete = $connection->query($_sqlDelete);
                if(!$resultDelete){
                    echo '<script language="javascript">';
                    echo 'alert("Cannot delete the old information")';
                    echo '</script>';
                    exit();
                }
            } catch (mysqli_sql_exception $q){
                echo '<script language="javascript">';
                echo 'alert("Database error : '.$q.')';
                echo '</scripst>';
                exit();
            }

        }
    } catch (mysqli_sql_exception $e){
        echo '<script language="javascript">';
        echo 'alert("Database error : '.$e.')';
        echo '</script>';
        exit();
    }
    $_textJavaSkill = $_POST['java_Skill'];
    $_textDataSkill = $_POST['databasse_Skill'];
    $_textSysSkill = $_POST['system_Skill'];
    $_line = 1;

    $_sqlInsert = "INSERT INTO SKILLPF(USERNAME, JAVA_INFO, DATA_INFO, SYS_INFO) 
            VALUES ('".$_userName."', '".$_textJavaSkill."', '".$_textDataSkill."', '".$_textSysSkill."')";
    /*     $_statement->bind_param(':_userName', $_userName);
         $_statement->bind_param(':_line', $_line);
         $_statement->bind_param(':_text', $_text);*/
    try{
        $result = $connection->query($_sqlInsert);

        if($result == TRUE){
           $_sqlQuery = "SELECT * FROM SKILLPF WHERE USERNAME = '".$_userName."'";
            try{
                $resultQuery = $connection->query($_sqlQuery);
                $row = mysqli_fetch_assoc($resultQuery);
                $value_Java = $row["JAVA_INFO"];
                $value_Data = $row["DATA_INFO"];
                $value_Sys = $row["SYS_INFO"];
            } catch (mysqli_sql_exception $e){
                echo '<script language="javascript">';
                echo 'alert("Database error : '.$e.')';
                echo '</script>';
                exit();
            }
            $status = "Information saved sucessfully";
        }
    } catch (mysqli_sql_exception $exception){
        echo '<script language="javascript">';
        echo 'alert("Skills Information do not save or Database error -> "'.$exception.')';
        echo '</script>';
        exit();
    } finally {
        mysqli_close($connection);
    }
} else if(isset($_GET['EDIT'])) {
    $_id = $_GET['EDIT'];
    $_sqlQuery = "SELECT * FROM vm1dta.OJECPF WHERE ID = :_id";
    $_statement = $connection->prepare($_sqlQuery);
    $_statement->bind_param(':_id', $_id);
    $_statement->execute();
    $getRow = $_statement->fetch();
}

?>