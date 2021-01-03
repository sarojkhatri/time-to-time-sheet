<!DOCTYPE html>
<html>

<head>


    <!-- Title Page-->
    <title>Add Employee | Admin Panel</title>

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
                    <h2 class="title">Registration Info</h2>
                    <form action="./addempprocess.php" method="POST" enctype="multipart/form-data">




                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <input class="input--style-1" type="text" placeholder="First Name" name="firstName" required="required">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Last Name" name="lastName" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email" required="required">
                        </div>
                        <p>Birthday</p>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="date" placeholder="BIRTHDATE" name="birthday" required="required">

                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Contact Number" name="contact" required="required" >
                        </div>



                        <div class="input-group">
                      		<input id="autocomplete" class="input--style-1" placeholder="Enter address" name="address" onFocus="geolocate()" type="text" required="required"></input>
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

                      			<td class="wideField"><input class="input--style-1" type="text" placeholder="Zip Code" name="zipcode" id="postal_code" disabled="true"></input>
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
                            <input class="input--style-1" type="text" placeholder="Department" name="dept" required="required">
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Degree" name="degree" required="required">
                        </div>


                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="employeeType">
                                        <option disabled="disabled" selected="selected">Employee Type</option>
                                        <option value="Fulltime">Full Time</option>
                                        <option value="Parttime">Part Time</option>
                                        <option value="Casual">Casual</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="file" placeholder="file" name="file">
                        </div>

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
<!-- end document-->
