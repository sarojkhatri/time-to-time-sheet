<?php
namespace myPHPnotes;

class Geocoding
{
    protected $api_key;
    protected $debug;
    protected $callurl = 'https://maps.googleapis.com/maps/api/geocode/json';
    function __construct($api_key, $debug = 0)
    {
        $this->api_key = $api_key;
       
        $this->debug = $debug;    
    }
    public function address($url, $data)
    {
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url . "?" . $data);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       $result = curl_exec($ch);

        return $result;
    }
    public function coordinate($url, $data)
    {
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url . "?" .http_build_query($data) );
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
       $result = curl_exec($ch);

        return $result;
    }
    public function getAddress($latitude, $longitude)
    {
      // $data = [
         // 'latlng' => $latitude,$longitude,
         //  'key' => $this->api_key
       // ];
       $data="latlng=".$latitude.",".$longitude."&key=".$this->api_key;
       // return $data;
       $addressData = $this->address($this->callurl, $data);
       return (json_decode($addressData)->results[0]->formatted_address);
    }
    public function getCoordinates($address)
    {
       $data = [
          'address' => $address,
         'key' => $this->api_key
       ];
       //$data="address=".$address."&key=".$this->api_key;
        $addressData = $this->coordinate($this->callurl, $data);
        $location = json_decode($addressData)->results[0]->geometry->location;
        return [ 'latitude' => $location->lat, 'longitude' => $location->lng];
    }
}

