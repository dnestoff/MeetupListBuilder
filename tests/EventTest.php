<?php

require('event.php');
 
class EventTests extends PHPUnit_Framework_TestCase
{
  
  private $event;
  private $args = array('name' => "Johnny's Day Date", 'epoch_time' => 1483387200000, 'utc_offset' => -25200000, 'group_name' => 'Everyone is happy', 'url' => 'https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/', 'description' => 'blah blah blah blah blah');
  private $expected = "Name: Johnny's Day Date\nTime: 01-02-2017 @ 13:00\nGroup_name: Everyone is happy\nUrl: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/\nDescription: blah blah blah blah blah\n";

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
    $this->assertEquals($this->expected, $result);
  }

 
}