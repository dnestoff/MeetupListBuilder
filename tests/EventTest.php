<?php

require('event.php');
 
class EventTests extends PHPUnit_Framework_TestCase
{
  
  private $event;
  private $args = array('name' => "Johnny's Day Date", 'epoch_time' => 1483387200000, 'utc_offset' => -25200000, 'group_name' => 'Everyone is happy', 'url' => 'https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/');
  private $expected = "\nName: Johnny's Day Date\nGroup name: Everyone is happy\nTime: 01-02-2017 @ 14:00\nUrl: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/\n";

  protected function setUp()
  {
    $this->event = new Event($this->args);
  }

  protected function tearDown()
  {
    $this->event = NULL;
  }

  public function testdisplay()
  {
    $result = $this->event->display();
    $this->assertEquals($this->expected, $result);
  }

 
}