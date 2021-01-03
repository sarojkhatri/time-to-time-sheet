<?php
//including the database connection file
include("../process/dbh.php");


//deleting form employee
if($_GET['eid']==1){
    $id=$_GET['id'];

    //deleting the row from table
    $result = mysqli_query($conn, "DELETE FROM employee WHERE id=$id");
    if(!$result){
        die('Error:'.mysqli_error($conn));
    }
    else{
        echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Deleted')
        window.location.href='viewemp.php';
        </SCRIPT>");
    }
}

else if($_GET['eid']==2){
  $cid=$_GET['cid'];

  //deleting the row from table
  $result = mysqli_query($conn, "DELETE FROM company WHERE compid=$cid");
  if(!$result){
      die('Error:'.mysqli_error($conn));
  }
  else{
      echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Succesfully Deleted')
      window.location.href='viewcompany.php';
      </SCRIPT>");
  }
}
?>
