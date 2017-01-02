<?php

require('group.php');
 
class GroupTests extends PHPUnit_Framework_TestCase
{
  
  private $group;
  private $args = array('group_name' => "Johnny's Team", 'url' => 'https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/', 'description' => 'blah blah blah blah blah', 'category' => 'Business', 'organizer_name' => "Jane Beach");
  private $expected = array("Group name: Johnny's Team", "Description: blah blah blah blah blah", "Organizer name: Jane Beach", "Category: Business", "Url: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/");

  protected function setUp()
  {
    $this->group = new Group($this->args);
  }

  protected function tearDown()
  {
    $this->group = NULL;
  }

  public function testdisplayGroup()
  {
    $result = $this->group->displayGroup();
    $this->assertEquals($this->expected, $result);
  }

 
}