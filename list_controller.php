<?php

require('meetup_request.php');

class ListController
{

    public $search_type;
    public $zip;

    public function __construct($search_type, $zip) 
    {
      $this->search_type = $search_type;
      $this->zip = $zip;
    }

    public function run() {
      
    }

    public function getData() {

    }

}


?>