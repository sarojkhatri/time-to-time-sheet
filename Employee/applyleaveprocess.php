<?php

    require_once ('../process/dbh.php');

    //getting id of the data from url
    $id = $_GET['id'];
    //echo $id;

    $reason = $_POST['reason'];


    $date1 = $_POST['start'];
    $start=date("Y-m-d",strtotime($date1));
    //echo $start;


    $date = $_POST['end'];
    $end=date("Y-m-d",strtotime($date));

    //need to validate ...........********************* echo npt working

    if($date1>=$date){
        echo'<script>alert("please select ddadavalid date");
    </script>';
    }
    else{
        
        $sql = "INSERT INTO `employeeleave`(`id`,`token`, `start`, `end`, `reason`, `status`) VALUES ('$id',NULL,'$start','$end','$reason','Pending')";

        $result = mysqli_query($conn, $sql);
        if($result){
            
            echo('<script>alert("appled sucessfully");</script>');
        }
        else{
            die('your errors='.mysqli_error($conn));
        }
    
    }
   
    //redirecting to the display page (index.php in our case)
    header("Location:./applyleave.php?id=$id");
?>



