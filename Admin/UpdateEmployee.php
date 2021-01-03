
<?php
    require_once ('../process/dbh.php');
	$id = (isset($_GET['id']) ? $_GET['id'] : '');
	$sql = "SELECT * from `employee` WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	if($result){
    
	while($res = mysqli_fetch_assoc($result)){
	$firstname = $res['firstName'];
	$lastname = $res['lastName'];
	$email = $res['email'];
	$contact = $res['contact'];
	$address = $res['address'];
	$gender = $res['gender'];
	$birthday = $res['birthday'];

	$dept = $res['dept'];
	$degree = $res['degree'];
	$employeeType = $res['employeeType'];

}
}

?>

<html>
<head>
	<title>View Employee |  Admin Panel | Staff Solution</title>
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

<?php include_once('./header.php');?>
		<!-- <form id = "registration" action="edit.php" method="POST"> -->
	<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Update Employee Info</h2>
                    <form id = "registration" action="./edit.php?cid=1" method="POST">

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" name="firstName" placeholder="First Name" value="<?php echo $firstname;?>" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="lastName" placeholder="Last Name" value="<?php echo $lastname;?>">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="email"  name="email" placeholder="Email" value="<?php echo $email;?>">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" name="birthday" placeholder="Birthdate" value="<?php echo $birthday;?>">

                                </div>
                            </div>

                            <div class="col-2">
                                <div class="input-group">
									<input class="input--style-1" type="text" name="gender" placeholder="Gender" value="<?php echo $gender;?>">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" name="contact" placeholder="Contact" value="<?php echo $contact;?>">
                        </div>



												<div class="input-group">
												 <input id="autocomplete" class="input--style-1" placeholder="Enter address" name="address" onFocus="geolocate()" type="text" value="<?php echo $address;?>"></input>
											 </div>

											 <table id="address" class="input-group">
												 <tr>

													 <td ><input class="input--style-1" type="text" placeholder="Street Address" name="street" id="street_number" disabled="true"></input>
													 </td>
													 <td  colspan="2"><input class="input--style-1" type="text" placeholder="Appartment,suite,unit etc." name="Appartment,suite,unit etc." id="route" disabled="true"></input>
													 </td>
												 </tr>
												 <tr>

													 <td class="wideField" colspan="3"><input class="input--style-1" type="text" placeholder="City" name="city" id="locality" disabled="true"></input>
													 </td>
												 </tr>
												 <tr>

													 <td class="slimField"><input class="input--style-1" type="text" placeholder="State" name="state" id="administrative_area_level_1" disabled="true"></input>
													 </td>

													 <td class="wideField"><input class="input--style-1" type="text" placeholder="Postal Code" name="zipcode" id="postal_code" disabled="true"></input>
													 </td>
												 </tr>
												 <tr>
													 <td class="wideField" colspan="3"><input class="input--style-1" type="text" placeholder="Country" name="country" id="country" disabled="true"></input>
													 </td>
												 </tr>
											 </table>
											 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCg4rES-cHvkyowz2QjYSS1aQi1vBJaYYM&libraries=places&callback=initAutocomplete" async defer></script>
												<script>
                        var placeSearch, autocomplete;
                        var componentForm = {
                          street_number: 'short_name',
                          route: 'long_name',
                          locality: 'long_name',
                          administrative_area_level_1: 'short_name',
                          country: 'long_name',
                          postal_code: 'short_name'
                        };

                        function initAutocomplete() {
                          autocomplete = new google.maps.places.Autocomplete(
                            (document.getElementById('autocomplete')), {
                              types: ['geocode']
                            });
                          autocomplete.addListener('place_changed', fillInAddress);
                        }

                        function fillInAddress() {
                          var place = autocomplete.getPlace();
                          for (var component in componentForm) {
                            document.getElementById(component).value = '';
                            document.getElementById(component).disabled = false;
                          }
                          for (var i = 0; i < place.address_components.length; i++) {
                            var addressType = place.address_components[i].types[0];
                            if (componentForm[addressType]) {
                              var val = place.address_components[i][componentForm[addressType]];
                              document.getElementById(addressType).value = val;
                            }
                          }
                        }

                        function geolocate() {
                          if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                              var geolocation = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                              };
                              var circle = new google.maps.Circle({
                                center: geolocation,
                                radius: position.coords.accuracy
                              });
                              autocomplete.setBounds(circle.getBounds());
                            });
                          }
                        }

                        </script>


                        <div class="input-group">
                            <input class="input--style-1" type="text" name="dept" placeholder="Department" value="<?php echo $dept;?>">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" name="degree" placeholder="Degree" value="<?php echo $degree;?>">
                        </div>

													<div class="input-group">
														<input class="input--style-1" type="text" name="employeeType" placeholder="Employee Type" value="<?php echo $employeeType;?>">

                            </div>
                        </div>
                        <input type="hidden" name="id" id="textField" value="<?php echo $id;?>" required="required"><br><br>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="update">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>


    <script src="js/global.js"></script> -->
</body>
</html>
