<?php

// Meetup API Key 2d126d4d6b61a4a2012b433218278
// Denver lat = 39.7392, long = -104.9903

// An example request - must have 'key' and 'sign' (=true)
  // upcoming NY-tech meetups: https://api.meetup.com/2/events?key=ABDE12456AB2324445&group_urlname=ny-tech&sign=true

// Working find/event in CO
  // https://api.meetup.com/find/events?country=united+states&lon=-104.9903&lat=39.7392&key=2d126d4d6b61a4a2012b433218278


class MeetupRequest
{
    const KEY = '2d126d4d6b61a4a2012b433218278';
    const URL = 'https://api.meetup.com';
    const FORMAT = 'json';
    public $sign = true;
    public $lat;
    public $long;

    public function __construct($zip, $args) 
    {
      $this->zip = $zip;
    }
 
    public function eventSearch() {
      // searching events in a given city
    }

    public function groupSearch() {
      // searching groups in a given city
    }

    // protected function zip_to_lat_long($zip) {
      // return [lat, long]
    // }

    // protected function callApi() {
      // make request to meetup API 
    // }

    // protected function parseResponse() {
      // convert from json to stdClass 
    // }

    // protected function constructParams() {
      // concatenate all params and return as string
    // }


}


// constructing the request
$den_lat_long = [39.7392, -104.9903];
$key = '2d126d4d6b61a4a2012b433218278';
$url = 'https://api.meetup.com';
$format = 'json';
$search_type = '/find/events';
$params = '?key=' . $key . '&lat=' . $den_lat_long[0] . '&lon=' . $den_lat_long[1] . '&format=' . $format;
$request = $url . $search_type . $params;

// grabbing the info via http get request
$response = file_get_contents($request);
echo $response[0][0];

// converts json object to php stdClass object
$data = json_decode($response);
print_r($data[1]);

// converting from epoch time -- still incorrect timezone (need to subtract offset)
$epoch = $data[1]->time;
echo date("Y-m-d H:i:s", substr($epoch, 0, 10));
