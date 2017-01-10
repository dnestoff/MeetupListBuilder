<?php

// The MeetupRequest class builds the request params string, makes the call to the Meetup API and turns the json response into an associative array

require('config.php');

class MeetupRequest
{
  // const MEETUP_KEY = getenv('MEETUP_KEY');
  // const GOOGLE_MAPS_KEY = getenv('GOOGLE_MAPS_KEY');
  protected $meetup_key;
  protected $google_maps_key;
  const URL = 'https://api.meetup.com';
  const FORMAT = 'json';
  public $zip;
  protected $lat;
  protected $lon;

  public function __construct($request_type, $zip) 
  {
    $this->request_type = $request_type;
    $this->zip = $zip;
    $this->meetup_key = getenv('MEETUP_KEY');
    $this->google_maps_key = getenv('GOOGLE_MAPS_KEY');
  }

  public function search() {
    $this->zipToLatLong();
    $request = $this->constructParams();
    return $this->callApi($request);
  }

  protected function zipToLatLong() {
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $this->zip . '&key=' . $this->google_maps_key;
    $response = $this->callApi($url);
    $lat_lon_array = $response['results'][0]['geometry']['location'];
    $this->lat = $lat_lon_array['lat'];
    $this->lon = $lat_lon_array['lng'];
    return;
  }

  protected function constructParams() {
    switch ($this->request_type) {
      case 'event':
        $route = '/find/events';
        break;
      case 'group':
        $route = '/find/groups';
        break;
    }
    $params = '?key=' . $this->meetup_key . '&lat=' . $this->lat . '&lon=' . $this->lon . '&format=' . MeetupRequest::FORMAT . '&sign=true';
    return MeetupRequest::URL . $route . $params;
  }

  protected function callApi($request) {
    $json_data = file_get_contents($request);
    $data_as_array = json_decode($json_data, true);
    return $data_as_array;
  }

}

?>
