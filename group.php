<?php

class Group
{
    public $group_name;
    public $description;
    public $organizer_name;
    public $category;
    public $url;

    public function __construct($args) 
    {
      $this->group_name = $args['group_name'];
      $this->description = $args['description'];
      $this->url = $args['url'];
      $this->category = $args['category'];
      $this->organizer_name = $args['organizer_name'];
    }

    public function displayGroup() {
      $group_info = '';
      foreach ($this as $key => $value) {
        $key_with_space = str_replace('_', ' ', $key);
        $group_info = $group_info . (ucfirst($key_with_space) . ": " . $value . "\n");
      }
      return $group_info;
    }


}

