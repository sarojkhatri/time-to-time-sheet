<?php
//require_once ('process/dbh.php');
//$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
//$result = mysqli_query($conn, $sql);
?>


<html>
<head>
	<title>Admin Panel | Staff Solution</title>
	<link rel="stylesheet" type="text/css" href="../css/styleemplogin.css">
</head>
<body>
<?php include_once('./header.php');?>

	<!-- <div class="divider"></div>
	<div id="divimg">
		<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Leaderboard </h2>
    	<table>

			<tr bgcolor="#000">
				<th align = "center">Seq.</th>
				<th align = "center">Emp. ID</th>
				<th align = "center">Name</th>
				<th align = "center">Points</th>


			</tr>



			<?php
			//	$seq = 1;
				//while ($employee = mysqli_fetch_assoc($result)) {
					//echo "<tr>";
				//	echo "<td>".$seq."</td>";
				//	echo "<td>".$employee['id']."</td>";

				//	echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";

				//	echo "<td>".$employee['points']."</td>";

				//	$seq+=1;
			//	}


			?>

		</table>

		<div class="p-t-20">
			<button class="btn btn--radius btn--green" type="submit" style="float: right; margin-right: 60px"><a href="reset.php" style="text-decoration: none; color: white"> Reset Points</button>
		</div> -->


	</div>
</body>
</html>
