<?php

require('event.php');
require('group.php');

class MeetupList
{
    public $items = array();
    protected $list_type;

    public function __construct($list_type) 
    {
      $this->list_type = $list_type;
    }

    public function displayList() {
      $list_as_string = '';
      foreach ($this->items as $item) {
        $list_as_string = $list_as_string . $item->display();
      }
      if ($list_as_string == '') {
        $list_as_string = "This search did not return any results."; 
      }
      return $list_as_string;
    }

    public function add($data_array) {
      $args = array('name' => $data_array['name'], 'url' => $data_array['link']);
      switch ($this->list_type) {
        case 'event':
          $args += array('epoch_time'=> $data_array['time'], 'utc_offset' => $data_array['utc_offset'], 'group_name' => $data_array['group']['name']);
          array_push($this->items, new Event($args));
          break;
        case 'group':
          $args += array('organizer_name'=> $data_array['organizer']['name'], 'category' => $data_array['category']['name']);
          array_push($this->items, new Group($args));
          break;
      }
    }

}