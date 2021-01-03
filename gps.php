<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Reverse Geocoding with HTML5 &amp; Google Demo | Ben Marshall</title>
</head>
<body>
<input type="button" class="button" id="go" value="Click Me and I'll Guess Your Address!">
<div id="results"></div>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="http://j.maxmind.com/app/geoip.js"></script> <!-- For our fallback -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="script.js"></script>
</body>
</html>
