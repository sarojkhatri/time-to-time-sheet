<?php
   require_once ('dbh.php');
   $id = $_GET['id'];
   $token = $_GET['token'];


    //deleting data from employeeleave table using token 
        $sql = "DELETE FROM `employeeleave` WHERE `employeeleave`.`token` = '$token' ";
        $result = mysqli_query($conn, $sql);
        
        if(!$result){
            die('error='. mysqli_error($conn));
        }
        else{
            echo ("<SCRIPT >
                    alert('Request Deleted Sucessfully');
                    </SCRIPT>");
             header("Location:./applyleave.php?id=$id");
        }
    
?>