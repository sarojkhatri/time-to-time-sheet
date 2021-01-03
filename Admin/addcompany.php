<!DOCTYPE html>
<html>
<head>
    <!-- Title Page-->
    <title>Add Company | Admin Panel</title>

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
                    <h2 class="title">Add Company</h2>
                    <form action="./addcompanyprocess.php" method="POST" enctype="multipart/form-data">


                        <div class="input-group">
                                <input class="input--style-1" type="text" placeholder="Company Name" name="compName" required="required">
                        </div>
                        <div class="input-group">
                      		<input id="autocomplete" class="input--style-1" placeholder="Enter address" name="compAddress" onFocus="geolocate()" type="text" required="required"></input>
                      	</div>

                      	
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
                            <input class="input--style-1" type="email" placeholder="Email" name="compemail" required="required">
                        </div>

                        <div class="row row-space">

                            <div class="col-2">



                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="Contact Number" name="compcontact" required="required" >
                        </div>




                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Company Type" name="comptype" required="required">
                        </div>


                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="compsubmit">Submit</button>
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
