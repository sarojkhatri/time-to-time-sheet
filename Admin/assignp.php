<?php

require_once ('../process/dbh.php');
$ind=$_GET['ind'];
if($ind==1)
$link="viewemp.php";
else$link="viewcompany.php";
$comment=$_POST['comment'];
$eid=$_POST['id'];
$getdate =$_POST['workday'];
$date= date("Y-m-d",strtotime($getdate));
$end= $_POST['endtime'];
$start = $_POST['starttime'];

if(!empty($_POST['gps'])) 
{
    $gps ='enable';

} else {

    $gps ='disable';

}

$cid=$_POST['company'];

$sql = "INSERT INTO `assign`( `eid`, `cid` , `start`, `end`, `comment`, `date`, `gps`) VALUES ( '$eid' , '$cid' , '$start', '$end', '$comment', '$date', '$gps')";
$result = mysqli_query($conn,$sql);
if($result){
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Succesfully Assigned')
    window.location.href='$link';
    </SCRIPT>");
}

else{
    die('error='. mysqli_error($conn));

    //echo('comment='.$comment);
    //echo('eid='.$eid);
   // echo('date='.$getdate);
   // echo('end='.$end);
   // echo('start='.$start);
   // echo('GPS='.$gps);
  //  echo('Company='.$cid);
    //echo ("<SCRIPT LANGUAGE='JavaScript'>
   // window.alert('Failed to Assign1')
   // window.location.href='javascript:history.go(-1)';
   // </SCRIPT>");
}




?>