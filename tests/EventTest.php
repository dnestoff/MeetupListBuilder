<?php

require('event.php');
 
class EventTests extends PHPUnit_Framework_TestCase
{
  
  private $event;
  private $args = array('name' => "Johnny's Day Date", 'epoch_time' => 1483553700000, 'utc_offset' => -25200000, 'group_name' => 'Everyone is happy', 'url' => 'https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/', 'description' => 'blah blah blah blah blah');
  private $expected = array("Name: Johnny's Day Date", "Time: 01-05-2017 @ 01:15", "Group_name: Everyone is happy", "Url: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/", "Description: blah blah blah blah blah");

  protected function setUp()
  {
    $this->event = new Event($this->args);
  }

  protected function tearDown()
  {
    $this->event = NULL;
  }

  public function testdisplayEvent()
  {
    $result = $this->event->displayEvent();
    $this->assertEquals($result, $this->expected);
  }

 
}