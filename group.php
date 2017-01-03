<?php

class Group
{
    public $name;
    public $description;
    public $organizer_name;
    public $category;
    public $url;

    public function __construct($args) 
    {
      $this->name = $args['name'];
      // $this->description = $args['description'];
      $this->url = $args['url'];
      $this->category = $args['category'];
      $this->organizer_name = $args['organizer_name'];
    }

    public function display() {
      $group_info = "\n";
      foreach ($this as $key => $value) {
        if ($value != '') {
          $key_with_space = str_replace('_', ' ', $key);
          $group_info = $group_info . (ucfirst($key_with_space) . ": " . $value . "\n");
        }  
      }
      return $group_info;
    }


}

