<?php

class Event
{
    public $name;
    public $time;
    public $group_name;
    public $url;
    public $description;

    public function __construct($args) 
    {
      $this->name = $args['name'];
      $this->group_name = $args['group_name'];
      $this->url = $args['url'];
      $this->description = $args['description'];
      $this->time = $this->convertTimeToDate($args['epoch_time'], $args['utc_offset']);
    }

    public function displayEvent() {
      $output = array();
      foreach ($this as $key => $value) {
        array_push($output, (ucfirst($key) . ": " . $value));
      };
      return $output;
    }

    protected function convertTimeToDate($epoch_time, $utc_offset) {
      $epoch = $epoch_time - $utc_offset;
      return date("m-d-Y @ H:i", substr($epoch, 0, 10));
    }


}

