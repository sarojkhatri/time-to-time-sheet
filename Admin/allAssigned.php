<?php
//$id = $_GET['id'];
require_once ('../process/dbh.php');
$sql = "Select * From assign order by cid";

//echo "$sql";
$result = mysqli_query($conn, $sql);

?>

  <html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../Admin/admincss/styleemplogin.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
  </head>
  <body>

  <?php include_once('./header.php');?>
    <div id="divimg">
    <div>

            <h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Weekly Time Sheet </h2>
        <table>
          <tr bgcolor="#000">
            <th align = "center">Company Name</th>
          </tr>

        <tr bgcolor="#000">
          <th align = "center">ID</th>
          <th align = "center">Assign Id</th>
          <th align = "center">Company id</th>
          <th align = "center">Start</th>
          <th align = "center">End</th>
          <th align = "center">Comment</th>
          <th align = "center">Location</th>
          <th align = "center">Date</th>
          <th align = "center">Action</th>
        </tr>

  <!--time sheet printing-->
        <?php
        //company Name


          //$seq = 1;
          while ($assign= mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$assign['eid']."</td>";
            echo "<td>".$assign['aid']."</td>";
            //echo "<td>".$assign['cid']."</td>";

            $reqid=$assign['cid'];
            echo "<td> <b><a href=\"companydetails.php?id=$assign[aid]&cid=$assign[cid]\" '>" .$reqid. "</a></b></td>";
            echo "<td>".$assign['start']."</td>";
            echo "<td>".$assign['end']."</td>";
            echo "<td>".$assign['comment']."</td>";
            echo "<td>".$assign['gps']."</td>";
            echo "<td>".$assign['date']."</td>";

          }

        ?>

      </table>
      <?php

        function cdetails($companyid){
          $sql3 = "SELECT * FROM `company` WHERE compid = $companyid";
          $result3 = mysqli_query($conn, $sql3);
          if(!$result2){
            echo('Error in company details='.mysqli_error($conn));
          }
          else{

            echo '<h2 style="font-family: "Montserrat", sans-serif; font-size: 25px; text-align: center;"> Company Details </h2>
            <table>
              <tr bgcolor="#000">
                <th align = "center">ID</th>
                <th align = "center">Name Id</th>
                <th align = "center">Address id</th>
                <th align = "center">Email</th>
                <th align = "center">Contact</th>
                <th align = "center">Type</th>
              </tr>';
            //company details
                while ($company= mysqli_fetch_assoc($result1)) {
                  echo "<tr>";
                  echo "<td>".$company['compid']."</td>";
                  echo "<td>".$company['compname']."</td>";
                  echo "<td>".$company['compaddress']."</td>";
                  echo "<td>".$company['compemail']."</td>";
                  echo "<td>".$company['comment']."</td>";
                  echo "<td>".$company['comptype']."</td>";

                }
            echo'</table>';
          }
        }

      ?>





</body>
</html>
