<?php

require('group.php');
 
class GroupTests extends PHPUnit_Framework_TestCase
{
  
  private $group;
  private $args = array('name' => "Johnny's Team", 'url' => 'https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/', 'description' => 'blah blah blah blah blah', 'category' => 'Business', 'organizer_name' => "Jane Beach");
  private $expected = "\nName: Johnny's Team\nOrganizer name: Jane Beach\nCategory: Business\nUrl: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/\n";

  protected function setUp()
  {
    $this->group = new Group($this->args);
  }

  protected function tearDown()
  {
    $this->group = NULL;
  }

  public function testdisplay()
  {
    $result = $this->group->display();
    $this->assertEquals($this->expected, $result);
  }

 
}