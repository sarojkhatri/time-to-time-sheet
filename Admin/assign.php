<?php require_once ('../process/dbh.php');
$a=0;
if(!empty($_GET['id'])) {
    $a=1;
}
if(!empty($_GET['cid'])) {
    $a=0;
}
?>
<html>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
    <!-- Title Page-->
    <title>Assign Project | Admin Panel</title>
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
    <link href="../css/button.css" rel="stylesheet" media="all">
    
    <?php include_once('./header.php');?>

<!--assigning via diffrent section like view employee company detais -->
        <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <h2 class="title">Assign Work</h2>
                        <form action="./assignp.php?ind=<?php echo $a?>" method="POST" enctype="multipart/form-data">
                        
                        <div class="col-2">
                            <p>Assign To</p>
                                
                                    <select name='id' id='id' required>
                                        <?php  
                                        ?>
                                    <option ></option>
                                    <?php
                                        $result1 = $conn->query("select id, email from employee");
                                        if(!$result1){
                                            echo('error='.mysqli_error($conn));

                                        }
                                       else{
                                            while ($row1 = $result1->fetch_assoc()) {
                                                $id = $row1['id'];
                                                $email= $row1['email'];
                                                if(!empty($_GET['id'])&&($id==$_GET['id'])) {
                                                    $id=$_GET['id'];
                                                    echo '<option value="'.$id.'" selected>'.$email.'</option>';
                                                }
                                                    else{
                                                        echo'<div class="rs-select2 js-select-simple select--no-search">';
                                                        echo'<div class="input-group">';
                                                        echo '<option value="'.$id.'">'.$email.'</option>';
                                                        echo'</div>';
                                                        echo'</div>';
                                                    }
       
                                            }
                                            echo "</select>";
                                        }

                                    ?>
                                
                            </div>
                            
                        <p>	&nbsp; </p>
                        <p>Date</p>
                        <div class="input-group">
                            <input class="input--style-1" type="date" placeholder="workday" name="workday"  required="required">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <p>Start Time</p>

                                <div class="input-group">
                                    <input class="input--style-1" type="time" placeholder="Start Time" name="starttime" required="required">
                                </div>
                            </div>

                            <div class="col-2">
                                    <p>End Time</p>
                                    <div class="input-group">
                                        <input class="input--style-1" type="time" placeholder="End Time" name="endtime" required="required">
                                    </div>
                            </div>

                        </div>
                            <div class="row row-space">
                                <div class="col-2">
                                <select name='company' required>
                                  
                                <option ></option>
                                <?php
                                    $result = $conn->query("select compid, compname from company");
                                    
                                    //$sql1= "select compid, compname from company";
                                    //$result = $mysqli->qurey($$conn, sql);                                    
                                    while ($row = $result->fetch_assoc()) {

                                               // unset($compid, $compname);

                                                $compid = $row['compid'];
                                                $compname = $row['compname'];
                                                if(!empty($_GET['cid'])&&($compid==$_GET['cid'])) {
                                                    echo '<option value="'.$compid.'" selected>'.$compname.'</option>';
                                                }
                                                else{
                                                    echo'<div class="rs-select2 js-select-simple select--no-search">';
                                                    echo'<div class="input-group">';
                                                    echo '<option value="'.$compid.'">'.$compname.'</option>';
                                                    //echo'<div class="select-dropdown" >';
                                                    //echo'</div>';
                                                    echo'</div>';
                                                    echo'</div>';
                                                }
                                                

                                    }
                                    echo "</select>";

                                ?>
                                </div>
                            
                                <div class="col-2">
                                Gps
                                    <label class="switch">
                                    <input type="checkbox" name='gps' id='gps' value='enable' id='check' >
                                    <span class="slider round" ></span>
                                    </label>
                                   
                                </div>
                            </div>

                            <p>	&nbsp; </p>
                            <div class="row row-space">
                                <div class="col-2">
                                <p>Comment</p>
                                <textarea id="comment" name="comment" rows="4" cols="50"></textarea>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="p-t-20">
                                        <button class="btn btn--radius btn--green" type="submit">Assign</button>
                                    </div>
                                </div>
                               
                            </div>   
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
<!-- end document-->
