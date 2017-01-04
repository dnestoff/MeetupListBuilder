<?php

// The Event class builds a group object and is responsible for how the object is displayed

class Event
{
  public $name;
  public $group_name;
  public $time;
  public $url;

  public function __construct($args) 
  {
    $this->name = $args['name'];
    $this->group_name = $args['group_name'];
    $this->url = $args['url'];
    $this->time = $this->convertTimeToDate($args['epoch_time'], $args['utc_offset']);
  }

  public function display() {
    $event_info = "\n";
    foreach ($this as $key => $value) {
      if ($value != '') {
        $key_with_space = str_replace('_', ' ', $key);
        $event_info = $event_info . (ucfirst($key_with_space) . ": " . $value . "\n");
      }
    }
    return $event_info;
  }

  protected function convertTimeToDate($epoch_time, $utc_offset) {
    date_default_timezone_set('America/Denver');
    return date("m-d-Y @ H:i", substr($epoch_time, 0, 10));
  }

}

?>

