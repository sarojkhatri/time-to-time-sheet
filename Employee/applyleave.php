<?php
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	require_once ('../process/dbh.php');
	$sql = "SELECT * FROM `employee` where id = '$id'";
	$result = mysqli_query($conn, $sql);
	$employee = mysqli_fetch_array($result);
	$empName = ($employee['firstName']);
	//echo "$id";
?>

<html>
<head>
	<title>Apply Leave | Employee Panel | Staff Solution</title>
	<link rel="stylesheet" type="text/css" href="../css/styleapply.css">
</head>
<body bg-color="#F0FFFF">

	<?php include_once('./eheader.php');?>

	<div class="divider"></div>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Apply Leave Form</h2>
                    <form action="./applyleaveprocess.php?id=<?php echo $id ?>" method="POST">


                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Reason" name="reason" id="reason" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                            	<p>Start Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="start" name='start' required>

                                </div>
                            </div>
                            <div class="col-2">
                            	<p>End Date</p>
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="end" name="end" required>

                                </div>
                            </div>
                        </div>



						
                        <div class="p-t-20">
						<p style='text-align:center'>
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
						</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





	<table>
			<tr>
				<th align = "center">Emp. ID</th>
				<th align = "center">Token</th>
				<th align = "center">Name</th>
				<th align = "center">Start Date</th>
				<th align = "center">End Date</th>
				<th align = "center">Total Days</th>
				<th align = "center">Reason</th>
				<th align = "center">Status</th>
				<th align = "center">Action</th>
			</tr>


			<?php


				$sql = "Select employee.id, employee.firstName, employee.lastName, employeeleave.token, employeeleave.start, employeeleave.end, employeeleave.reason, employeeleave.status From employee, employeeleave Where employee.id = $id and employeeleave.id = $id order by employeeleave.token";
				$result = mysqli_query($conn, $sql);
				while ($employee = mysqli_fetch_assoc($result)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";
					echo "<td>".$employee['id']."</td>";
					echo "<td>".$employee['token']."</td>";
					echo "<td>".$employee['firstName']." ".$employee['lastName']."</td>";
					echo "<td>".$employee['start']."</td>";
					echo "<td>".$employee['end']."</td>";
					echo "<td>".$interval->days."</td>";
					echo "<td>".$employee['reason']."</td>";
					echo "<td>".$employee['status']."</td>";
					echo "<td><a href=\"./DeleteLeave.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Delete the request?')\">Delete</a> </td>";
				}
			?>
		</table>
</body>
</html>
