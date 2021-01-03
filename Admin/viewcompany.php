<?php

require_once ('../process/dbh.php');
$sql = "SELECT * from company";


$result = mysqli_query($conn, $sql);
if(!$result){
    die('error='.mysqli_error($conn));
}
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

				<th align = "center">ID</th>
				<th align = "center">Name</th>
				<th align = "center">Address</th>
				<th align = "center">Email</th>
				<th align = "center">Contact</th>
				<th align = "center">Type</th>
				<th align = "center">Options</th>
			</tr>

			<?php
				while ($company = mysqli_fetch_assoc($result)) {
					echo "<tr>";

					echo "<td>".$company['compid']."</td>";
					echo "<td>".$company['compname']."</td>";
					echo "<td>".$company['compaddress']."</td>";
					echo "<td>".$company['compemail']."</td>";
					echo "<td>".$company['compcontact']."</td>";
					echo "<td>".$company['comptype']."</td>";
					echo "<td><a href=\"updatecompany.php?cid=$company[compid]\">Edit</a> | <a href=\"delete.php?cid=$company[compid]&&eid=2\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>|<a href=\"assign.php?cid=$company[compid]&&eid=2\">Assign</a></td>";

				}
			?>
		</table>
		<link href="../css/main.css" rel="stylesheet" media="all">
		<form action="./addcompany.php" method="POST" enctype="multipart/form-data">
		<div class="row row-space">
			<div class="col-2">
				<div class="p-t-20">
					<p style="align:'center'"> <button class="btn btn--radius btn--green" type="submit">Add Company</button></p>
				</div>
			</div>

        </div>


</body>
</html>
