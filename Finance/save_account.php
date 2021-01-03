<?php include 'header.php'  ?>
<body>

<?php

require_once ('process/dbh.php');


$empid = $_POST['id'];
$role = $_POST['role'];
$bank = $_POST['bank'];
$b_type = $_POST['b_type'];
$es = $_POST['es'];
$bnk_acc = $_POST['bnk_acc'];

$es = $_POST['es'];


$sql = "INSERT INTO Employee_acc (id,role,bank_acc_no,bank_name,bank_type,es)
VALUES ('$id', '$role', '$bnk_acc', '$bank','$b_type'$es)";

if ($conn->query($sql) === TRUE) {
    // echo "New Employee created successfully";
    ?>

  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Account <strong class="text-capitalize"><?php echo $empid; ?></strong> added Successfully.
  </div>

  <div class="container text-center">
    <a class="btn btn-primary" href="accounts.php"> Home </a>
  </div>

  <?php
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

  ?>
