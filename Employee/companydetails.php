<?php

    require_once ('../process/dbh.php');

    $id=$_GET['id'];
    //$id=114;
    $cid=$_GET['cid'];
    //$aid=3;
    $sql="SELECT * FROM company WHERE compid=$cid";
    $result= mysqli_query($conn, $sql);
    if(!$result){
        die('errors='.mysqli_errror($conn));
    }
    else{
        while ($comp= mysqli_fetch_assoc($result)) {
            $compid=$comp['compid'];
            $compname=$comp['compname'];
            $compaddress=$comp['compaddress'];
            $compemail=$comp['compemail'];
            $compcontact=$comp['compcontact'];
            $comptype=$comp['comptype'];
        }
    }
?>

<html>
<head>
	<title>comapny details </title>
	<link rel="stylesheet" type="text/css" href="../css/styleapply.css">
</head>
<body bg-color="#F0FFFF">

	<header>
		<nav>
			<h1>staff solution </h1>     
           
            <ul id="navli">
                <li><a href="eloginwel.php?id=<?php echo $id; ?>"> Back </a></li>
			</ul>
		</nav>
	</header>

    <div class="divider"></div>
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                   <p style='text-align:center'><h2 class="title"> <?php echo $compname; ?></h2></p>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                            	    <p>ID:  <?php echo $compid;?> </p>
                                </div>
                            </div>  
                        </div>	
                        <div></div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                	<p>Address: <?php echo $compaddress;?> </p>
                                </div>
                            </div>   
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                            	    <p>Email: <?php echo $compemail;?> </p>
                                </div>
                            </div>   
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                            	    <p>Contact: <?php echo $compcontact;?> </p>
                                </div>
                            </div>   
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                            	    <p>Type: <?php echo $comptype;?> </p>
                                </div>
                            </div>   
                        </div>	    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
