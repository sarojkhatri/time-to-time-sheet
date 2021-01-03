<?php

require_once ('../process/dbh.php');

//$sql = "SELECT * from `employeeleave`";
$sql = "Select employee.id, employee.firstName, employee.lastName, employeeleave.start, employeeleave.end, employeeleave.reason, employeeleave.status, employeeleave.token From employee, employeeleave Where employee.id = employeeleave.id order by employeeleave.token";

//echo "$sql";
$result = mysqli_query($conn, $sql);
if(!$result){
    echo('your errors='.mysqli_error());
}

//else{
  //  echo('<script>alert("appled sucessfully");</script>');
//}

?>



<html>
<head>
	<title>Employee Leave | Admin Panel | Staff Solution</title>
	<link rel="stylesheet" type="text/css" href="../css/styleview.css">
</head>
<body>
<?php include_once('./header.php');?>
	<div id="divimg">
		<table>
			<tr>
				<th>Emp. ID</th>
				<th>Token</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Total Days</th>
				<th>Reason</th>
				<th>Status</th>
				<th>Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				//echo "difference " . $interval->days . " days ";

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";

					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";

				}


			?>

		</table>

	</div>
</body>
</html>
