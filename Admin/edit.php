<?php

require_once ('../process/dbh.php');

//editing for employee.......................
if($_GET['eid']==1)
{
    $sql = "SELECT * FROM `employee` WHERE 1";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die('error='.mysqli_error($conn));
    }
	//$id = mysqli_real_escape_string($conn, $_POST['id']);
	$firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastName']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$gender = mysqli_real_escape_string($conn, $_POST['gender']);

	$dept = mysqli_real_escape_string($conn, $_POST['dept']);
	$degree = mysqli_real_escape_string($conn, $_POST['degree']);
	$employeeType = mysqli_real_escape_string($conn, $_POST['employeeType']);

	//$salary = mysqli_real_escape_string($conn, $_POST['salary']);
	//$result = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`password`='$email',`gender`='$gender',`contact`='$contact',`nid`='$nid',`salary`='$salary',`address`='$address',`dept`='$dept',`degree`='$degree' WHERE id=$id");
    $result1 = mysqli_query($conn, "UPDATE `employee` SET `firstName`='$firstname',`lastName`='$lastname',`email`='$email',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`address`='$address',`dept`='$dept',`degree`='$degree',`employeeType`='$employeeType' WHERE id=$id");
    //$result = mysqli_query($conn,"UPDATE `employee` SET `firstName`='$firstname',`lastName`='lastname',`email='$email',`birthday`='$birthday',`gender`='$gender',`contact`='$contact',`address`='$address',`dept`='$dept',`degree`='$degree',`employeeType`='$employeeType' WHERE id=$id");
    if(!$result1){
        die('error='.mysqli_error($conn));
    }
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='viewemp.php';
    </SCRIPT>");
}


//editing for company............................

else if($_GET['eid']==2)
{


}
?>
