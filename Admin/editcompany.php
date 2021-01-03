<?php

require_once ('../process/dbh.php');
$cid=$_GET['cid'];
$sql="SELECT * FROM `company` where compid=$cid";
$result = mysqli_query($conn, $sql);

//editing for company.......................

//die('id'.$cid);

    $sql = "SELECT * FROM `company` WHERE compid=$cid";
    $result = mysqli_query($conn, $sql);

    if(!$result){
        die('error='.mysqli_error($conn));
    }

	$compName = mysqli_real_escape_string($conn, $_POST['compname']);
	$compAddress = mysqli_real_escape_string($conn, $_POST['compaddress']);
	$compEmail = mysqli_real_escape_string($conn, $_POST['compemail']);
	$compContact = mysqli_real_escape_string($conn, $_POST['compcontact']);
	$compType = mysqli_real_escape_string($conn, $_POST['comptype']);
	

    $result1 = mysqli_query($conn, "UPDATE `company` SET `compname`='$compName', `compaddress`='$compAddress',`compemail`='$compEmail',`compcontact`='$compContact',`comptype`='$compType' WHERE compid=$cid");
    if(!$result1){
        die('error='.mysqli_error($conn));
    }
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Updated')
    window.location.href='viewcompany.php';
    </SCRIPT>");
//UPDATE `company` SET `compid`=[value-1],`compname`=[value-2],`compaddress`=[value-3],`compemail`=[value-4],`compcontact`=[value-5],`comptype`=[value-6] WHERE 1
?>
