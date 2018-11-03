<?php
    include('Controller/Connection/connection.php');
    $_sqlSkillQuery = "SELECT * FROM SKILLPF WHERE USERNAME = '".$_userName."'";
    $_sqlOjectQuery = "SELECT * FROM OJECPF WHERE USERNAME = '".$_userName."'";
    try{
        $resultSqlSkillQuery = $connection->query($_sqlSkillQuery);
        $row = mysqli_fetch_assoc($resultSqlSkillQuery);
        $value_Java = $row["JAVA_INFO"];
        $value_Data = $row["DATA_INFO"];
        $value_Sys = $row["SYS_INFO"];
        //////////////////////
        $resultSqlOjectQuery = $connection->query($_sqlOjectQuery);
        /*$row = mysqli_fetch_assoc($resultSqlOjectQuery);
        $value_Oject = $row["TEXT_INFO"];*/

        /*if ($resultSqlOjectQuery->num_rows > 0) {
            // output data of each row
            while($row = $resultSqlOjectQuery->fetch_assoc()) {
                echo $row["TEXT_INFO"];
            }
        }*/


    } catch (mysqli_sql_exception $e){
        echo '<script language="javascript">';
        echo 'alert("Database error : '.$e.')';
        echo '</script>';
        exit();
    } finally{
        mysqli_close($connection);
    }
?>