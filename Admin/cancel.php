<?php
//including the database connection file
include("../process/dbh.php");

//getting id of the data from url
$id = $_GET['id'];
$token = $_GET['token'];
//deleting the row from table
$result = mysqli_query($conn, "UPDATE `employeeleave` SET `status`='Cancelled' WHERE `id`=$id and `token` = $token");
if(!$result)
{
    die('your error='.mysqli_error($result));
}
//redirecting to the display page (index.php in our case)
header("Location:empleave.php");
?>

