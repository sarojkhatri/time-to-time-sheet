<head>
    <title>staff solution</title>
</head>
<body>
<?php
require_once ('../process/dbh.php');


$sql = "SELECT * FROM employee INNER JOIN Employee_acc ON employee.id=Employee_acc.id order by  employee.firstname;";
$result = $conn->query($sql);
?>

<div class="container text-center mt-3">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Add Account Details
  </button>
</div>
<?php

    $get_id = "SELECT * FROM Employee_Information order by ts desc limit  1; ";
    $ids = $conn->query($get_id);
    if ($ids->num_rows > 0) {
      // output data of each row
      while($rec = $ids->fetch_assoc()) {
        ?>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Account Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form  action="save_account.php" method="post" >
            <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group text-monospace">
                    <label for="empid">Employee_ID:</label>
                    <input type="text" class="form-control" name="empid" value="<?php echo $rec['employee_id']; }} ?>" required>
                  </div>

                  <div class="form-group text-monospace">
                    <label for="bank">Bank Name:</label>
                    <input type="text" class="form-control" name="bank" required>
                  </div>
                  <div class="form-group text-monospace">
                    <label for="b_type">Bank Type:</label>
                    <select class="form-control" name="b_type">
                        <option>Savings</option>
                        <option>Current</option>
                    </select>
                  </div>
                  <div class="form-group text-monospace">
                    <label for="es">Employee Share:</label>
                    <input type="text" class="form-control" name="es" required>
                  </div>
                </div>


                <div class="col-sm-6">
                  <div class="form-group text-monospace">
                    <label for="role">Role:</label>
                    <select class="form-control" name="role" id="sel2">
                        <option>Employer</option>
                        <option>Manager</option>
                    </select>
                  </div>

                  <div class="form-group text-monospace">
                    <label for="bnk_acc">Bank Acc.No:</label>
                    <input type="text" class="form-control" name="bnk_acc" required>
                  </div>
                  <div class="form-group text-monospace">
                    <label for="pf">PF.No:</label>
                    <input type="text" class="form-control" name="pf" required>
                  </div>
                  <div class="form-group text-monospace">
                    <label for="os">Organization Share:</label>
                    <input type="text" class="form-control" name="os" required>
                  </div>
                </div>
              </div>

            <div class="float-right mt-3">
              <button class="btn btn-danger" onclick="reset()" >Reset</button>
              <input class="btn btn-success" type="submit" name="submit" value="Save">
            </div>






          </form>


          </div>
        </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<div class="col-sm-12 text-center mt-4 ">
<div class="row">
    <div class="col-sm-6">
        <table class="table table-bordered">
        <li class="list-group-item active">Provident Fund Details</li>
        <thead class="bg-success">
        <tr>
            <th>Employee Id</th>
            <th>Employee Name</th>
            <th>P.F Number </th>
            <th>Employee share</th>
            <th>Organization share</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {


        ?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["firstname"]." ".$row["lastname"] ?></td>
            <td><?php echo $row["employee_id"] ?></td>

        </tr>

        <?php
            }
        }
        ?>


        </tbody>
    </table>
    </div>

    <div class="col-sm-6">
        <table class="table table-bordered">
        <li class="list-group-item active">Bank Account Details</li>
        <thead class="bg-success">
        <tr>
            <th>Employee Id</th>
            <th>Employee Name</th>
            <th>Bank Name</th>
            <th>Account Number</th>
            <th>Account Type </th>
        </tr>
        </thead>
        <tbody>
        <?php

        $sql1 = "SELECT * FROM employee INNER JOIN Employee_acc ON employee.id=Employee_acc.id order by  employee.firstname;";
        $result1 = $conn->query($sql1);



        if ($result1->num_rows > 0) {
            // output data of each row
            while($row1 = $result1->fetch_assoc()) {


        ?>
            <tr>
                <td><?php echo $row1["employee_id"] ?></td>
                <td><?php echo $row1["first_name"]." ".$row1["last_name"] ?></td>
                <td><?php echo $row1["bank_name"] ?></td>
                <td><?php echo $row1["bank_acc_no"] ?>  </td>
                <td><?php echo $row1["bank_type"] ?> </td>
            </tr>
            <?php
            }
        }
        ?>
        </tbody>
    </table>
    </div>

</div>


</div>
