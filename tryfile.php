<?php
require_once('Geocoding.php');
use myPHPnotes\Geocoding;
$geo=new Geocoding('AIzaSyCFlcU0PUQIJgol1bUlWGaN1qA6GTawVsg');
$address=$geo->getAddress('151.0991769', '-33.906366399999996');
var_dump($address);
//https://maps.googleapis.com/maps/api/geocode/json?latlng=-33.841554,151.009269&key=AIzaSyCFlcU0PUQIJgol1bUlWGaN1qA6GTawVsg
$coordinates=$geo->getCoordinates('6 Louis St, Granville NSW 2142, Australia');
var_dump($coordinates);