<?php
	$id = $_GET['id'];


	require_once ('../process/dbh.php');
	 $sql1 = "SELECT * FROM `employee` where id = '$id'";
	 $result1 = mysqli_query($conn, $sql1);
	 $employeen = mysqli_fetch_array($result1);
	 $empName = ($employeen['firstName']);

	$sql1="Select * From employee, assign Where employee.id = $id and assign.eid = $id AND assign.date>=cast((now()) as date) order by assign.aid";

	//$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
	//$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

	$sql2 = "Select * From employee, employeeleave Where employee.id = $id and employeeleave.id = $id order by employeeleave.token";




	$result2 = mysqli_query($conn, $sql2);
	$result1 = mysqli_query($conn, $sql1);

	if(!$result1){
		echo('Error='.mysqli_error($conn));
	}

	if(!$result2){
		echo('Error='.mysqli_error($conn));
	}
?>



<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../Admin/admincss/styleemplogin.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
</head>
<body>

<?php include_once('./eheader.php');?>
	<div id="divimg">
	<div>
		<!-- <h2>Welcome <?php echo "$empName"; ?> </h2> -->

		    	<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Weekly Time Sheet </h2>
    	<table>
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
				//$seq = 1;
				while ($assign= mysqli_fetch_assoc($result1)) {
					echo "<tr>";
					echo "<td>".$id."</td>";
					echo "<td>".$assign['aid']."</td>";
					$reqid=$assign['cid'];
					echo "<td> <b><a href=\"companydetails.php?id=$assign[id]&cid=$assign[cid]\" '>" .$reqid. "</a></b></td>";
					echo "<td>".$assign['start']."</td>";
					echo "<td>".$assign['end']."</td>";
					echo "<td>".$assign['comment']."</td>";
					echo "<td>".$assign['gps']."</td>";
					echo "<td>".$assign['date']."</td>";
					echo "<td><a href=\"#?id=$assign[id]\"  onClick=\"return confirm('Are you sure you want to start your shift ?')\">Start</a> | <a href=\"#?id=$assign[id]\" onClick=\"return confirm('Are you sure you finished your shift?')\">Finish</a></td>";
					//$seq+=1;
					//Company_details($assign['cid'])
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






		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave Satus</h2>


    	<table>

			<tr>

				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td></tr>";

				}
			?>
		</table>
</body>
</html>
