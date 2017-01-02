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
      $event_info = '';
      foreach ($this as $key => $value) {
        $event_info = $event_info . (ucfirst($key) . ": " . $value . "\n");
      }
      return $event_info;
    }

    protected function convertTimeToDate($epoch_time, $utc_offset) {
      $epoch = $epoch_time + $utc_offset;
      return date("m-d-Y @ H:i", substr($epoch, 0, 10));
    }


}

