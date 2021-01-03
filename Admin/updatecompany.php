
<?php
  require_once ('../process/dbh.php');
  $cid=$_GET['cid'];
  //die('id'.$cid);
  $sql = "SELECT * from `company` WHERE compid=$cid";
  $result = mysqli_query($conn, $sql);
  if(!$result)
  echo mysqli_error($conn);

  while($res = mysqli_fetch_assoc($result)){
    //die('im inside');
  $compName = $res['compname'];
  $compAddress = $res['compaddress'];

  $compEmail = $res['compemail'];
  $compContact = $res['compcontact'];
  $compType = $res['comptype'];
}


?>
<!DOCTYPE html>
<html>
<head>
    <!-- Title Page-->
    <title> Edit Company | Admin Panel</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>
<body>

    <?php include_once('./header.php')?>

    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                  <h2 class="title">Update Company Info</h2>

                  <form id = "registration" action="./editcompany.php?cid=<?php echo $cid;?>" method="POST">


                        <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Company Name" name="compname" value="<?php echo $compName;?>">
                        </div>
                        <div class="input-group">
                      		<input id="autocomplete" class="input--style-1" placeholder="Enter address" onFocus="geolocate()" type="text" name="compaddress" value="<?php echo $compAddress;?>">
                      	</div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="compemail" value="<?php echo $compEmail;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Contact Number" name="compcontact" value="<?php echo $compContact;?>" >
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Company Type" name="comptype" value="<?php echo $compType;?>">
                        </div>
                        <input type="hidden" name="compid" id="textField" value="<?php echo $compid;?>" required="required"><br><br>
                        <div class="p-t-20">

                        <div class="p-t-20">
                          <button class="btn btn--radius btn--green" type="submit" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<!-- end document-->
