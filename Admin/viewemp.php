<?php

require_once ('../process/dbh.php');
$sql = "SELECT * from employee";

//echo "$sql";
$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>View Employee |  Admin Panel | Staff Solution</title>
	<link rel="stylesheet" type="text/css" href="../css/styleview.css">
</head>
<body>
	<?php include_once('./header.php')?>

		<table>
			<tr>

				<th align = "center">Emp.ID</th>
				<th align = "center">Picture</th>
				<th align = "center">Name</th>
				<th align = "center">Email</th>
				<th align = "center">Birthday</th>
				<th align = "center">Gender</th>
				<th align = "center">Contact</th>

				<th align = "center">Address</th>
				<th align = "center">Department</th>
				<th align = "center">Degree</th>
				<th align = "center">EmployeeType</th>



				<th align = "center">Options</th>
			</tr>

			<?php
				while ($employee = mysqli_fetch_assoc($result)) {
					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td><img src='../images/".$employee['pic']."' height = 60px width = 60px></td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";

					echo "<td>".$employee['email']."</td>";
					echo "<td>".$employee['birthday']."</td>";
					echo "<td>".$employee['gender']."</td>";
					echo "<td>".$employee['contact']."</td>";

					echo "<td>".$employee['address']."</td>";
					echo "<td>".$employee['dept']."</td>";
					echo "<td>".$employee['degree']."</td>";
					echo "<td>".$employee['employeeType']."</td>";


					echo "<td><a href=\"UpdateEmployee.php?id=$employee[id]&&eid=1\">Edit</a> | <a href=\"delete.php?id=$employee[id]&&eid=1\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>|<a href=\"assign.php?id=$employee[id]&&eid=1\">Assign</a></td>";

				}
			?>
		</table>
		<link href="../css/main.css" rel="stylesheet" media="all">
		<form action="./addemp.php" method="POST" enctype="multipart/form-data">
		<div class="row row-space">
			<div class="col-2">
				<div class="p-t-20">
					<p style="align:'center'"> <button class="btn btn--radius btn--green" type="submit">Add Employee</button></p>
				</div>
			</div>
                               
        </div>  


</body>
</html>
