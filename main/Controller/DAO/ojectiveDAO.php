<?php
    include 'Controller/Connection/connection.php';
    $_sqlQuery = "SELECT * FROM OJECPF WHERE USERNAME = '".$_userName."'";
    try{
        $resultQuery = $connection->query($_sqlQuery);
        /*$row = mysqli_fetch_assoc($resultQuery);
        $value = $row["TEXT_INFO"];*/
    } catch (mysqli_sql_exception $e){
        echo '<script language="javascript">';
        echo 'alert("Database error : '.$e.')';
        echo '</script>';
        exit();
    }
     if(isset($_POST['SAVE'])){
         $_userName = 'dho43';
         $_sqlQuery = "SELECT * FROM OJECPF WHERE USERNAME = '".$_userName."'";
         $resultQuery = $connection->query($_sqlQuery);
         try{
             $resultQuery = $connection->query($_sqlQuery);
             if($resultQuery){
                 $_sqlDelete = "DELETE FROM OJECPF WHERE USERNAME = '".$_userName."'";
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

         $_text = $_POST['OJECTIVE'];
         $_line = 1;
         if(strlen($_text) > 30){
             $count = 0;
             $position = 0;
             $flagFirst = FALSE;
             $maxlength = 30;
             $sqlInsert = "";
             for ($x = 0; $x <= strlen($_text); $x++) {
                 $count++;
                 if($count == 30 || $x=strlen($_text)){
                     if($flagFirst == FALSE){
                         $sqlInsert = "INSERT INTO OJECPF(USERNAME, SEQ, TEXT_INFO)
                                          VALUES ('".$_userName."', '".$_line."', '".substr($_text, $position, $maxlength)."');";
                         $flagFirst = TRUE;
                     } else {
                         if ($x = strlen($_text)){
                             $sqlInsert .= "INSERT INTO OJECPF(USERNAME, SEQ, TEXT_INFO)
                                              VALUES ('" . $_userName . "', '" . $_line . "', '" . substr($_text, $position, $count) . "');";
                         } else {
                             $sqlInsert .= "INSERT INTO OJECPF(USERNAME, SEQ, TEXT_INFO)
                                              VALUES ('" . $_userName . "', '" . $_line . "', '" . substr($_text, $position, $maxlength) . "');";
                         }
                     }
                     $count = 0;
                     $position = $x;
                     $_line++;
                 }
             }
             try{
                 $resultInsert = $connection->multi_query($sqlInsert);
             } catch (mysqli_sql_exception $exception){
                 echo "Insert Data is error -> ".$exception;
                 exit();
             }
         } else {
             $_sqlInsert = "INSERT INTO OJECPF(USERNAME, SEQ, TEXT_INFO) VALUES ('".$_userName."', '".$_line."', '".$_text."')";
             /*     $_statement->bind_param(':_userName', $_userName);
                  $_statement->bind_param(':_line', $_line);
                  $_statement->bind_param(':_text', $_text);*/
             try{
                 $result = $connection->query($_sqlInsert);
                 if($result == TRUE){
                     $_sqlQuery = "SELECT * FROM OJECPF WHERE USERNAME = '".$_userName."'";
                     try{
                         $resultQuery = $connection->query($_sqlQuery);
                         /*$row = mysqli_fetch_assoc($resultQuery);
                         $value = $row["TEXT_INFO"];*/
                     } catch (mysqli_sql_exception $e){
                         echo '<script language="javascript">';
                         echo 'alert("Database error : '.$e.')';
                         echo '</script>';
                         exit();
                     }
                     echo '<script language="javascript">';
                     echo 'alert("Information saved sucessfully")';
                     echo '</script>';
                 }
             } catch (mysqli_sql_exception $exception){
                 echo '<script language="javascript">';
                 echo 'alert("Information do not save or Database error -> "'.$exception.')';
                 echo '</script>';
                 exit();
             } finally {
                 mysqli_close($connection);
             }
         }
     } else if(isset($_GET['EDIT'])){
         $_id = $_GET['EDIT'];
         $_sqlQuery = "SELECT * FROM vm1dta.OJECPF WHERE ID = :_id";
         $_statement = $connection->prepare($_sqlQuery);
         $_statement->bind_param(':_id', $_id);
         $_statement->execute();
         $getRow =  $_statement->fetch();
     }

?>