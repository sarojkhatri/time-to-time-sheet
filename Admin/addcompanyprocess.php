<?php

require_once ('../process/dbh.php');

$compName = $_POST['compName'];
$compAddress = $_POST['compaddress'];
$compEmail = $_POST['compemail'];
$compContact = $_POST['compcontact'];
$compType = $_POST['comptype'];

$sql = "INSERT INTO company(compid,compname, compaddress, compemail, compcontact,comptype) VALUES (null,'$compName','$compAddress','$compEmail','$compContact','$compType')";

$result = mysqli_query($conn, $sql);

if(($result) == 1){

echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Succesfully Added')
window.location.href='./viewcompany.php';
</SCRIPT>");
//header("Location: ..//aloginwel.php");
}

else{
//echo ("<SCRIPT LANGUAGE='JavaScript'>
//  window.alert('Failed to Register')
//  window.location.href='javascript:history.go(-1)';
//  </SCRIPT>");
//header("Location: ..//aloginwel.php");
echo "Error:".$sql."<br>".mysqli_error($conn);
}


?>
