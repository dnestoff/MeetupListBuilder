<?php

class MeetupRequest
{
    const MEETUP_KEY = '2d126d4d6b61a4a2012b433218278';
    const GOOGLE_MAPS_KEY = 'AIzaSyCtnWtHl15nusQIPNE8pwDKagAzI0ZPNw8';
    const URL = 'https://api.meetup.com';
    const FORMAT = 'json';
    public $zip;
    public $lat;
    public $lon;

    public function __construct($zip) 
    {
      $this->zip = $zip;
    }
 
    public function eventSearch() {
      // searching events in a given city
      $this->zipToLatLong();
      $request = $this->constructParams('event');
      $response = $this->callApi($request);
      print_r($this->parseResponse($response));
      return $this->parseResponse($response);
    }

    public function groupSearch() {
      $this->zipToLatLong();
      $request = $this->constructParams('group');
      $response = $this->callApi($request);
      return $this->parseResponse($response);
    }


    protected function zipToLatLong() {
      $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $this->zip . '&key=' . MeetupRequest::GOOGLE_MAPS_KEY;
      $response = $this->callApi($url);
      $maps_array = $this->parseResponse($response);
      $lat_lon_array = $maps_array['results'][0]['geometry']['location'];
      $this->lat = $lat_lon_array['lat'];
      $this->lon = $lat_lon_array['lng'];
      return null;
    }

    protected function callApi($request) {
      return file_get_contents($request); 
    }

    protected function parseResponse($response) {
      // convert from json to stdClass 
      return json_decode($response, true);
    }

    protected function constructParams($search_type) {
      // SWITCH for value of $route (group OR event)
      switch ($search_type) {
        case 'event':
          $route = '/find/events';
          break;
        case 'group':
          $route = '/find/groups';
          break;
      }
      $params = '?key=' . MeetupRequest::MEETUP_KEY . '&lat=' . $this->lat . '&lon=' . $this->lon . '&format=' . MeetupRequest::FORMAT . '&sign=true';
      return MeetupRequest::URL . $route . $params;
    }


}

