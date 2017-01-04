<?php

require('meetup_request.php');
require('meetup_list.php');

// The ListController class calls upon the Meetup api by instantiating a new MeetupRequest class, then passes the retrieved data to a MeetupList class object

class ListController
{

  protected $search_type;
  protected $zip;

  public function __construct($search_type, $zip) 
  {
    $this->search_type = $search_type;
    $this->zip = $zip;
  }

  public function run() 
  {
    $list = new MeetupList($this->search_type);
    $api_data = $this->getData();
    foreach ($api_data as $record) {
      $list->add($record);
    }
    return $list->displayList();
  }

  protected function getData() 
  {
    $meetup_request = new MeetupRequest($this->search_type, $this->zip);
    return $meetup_request->search();
  }

}

?>