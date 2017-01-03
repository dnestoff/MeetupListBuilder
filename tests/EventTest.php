<?php

require('event.php');
 
class EventTests extends PHPUnit_Framework_TestCase
{
  
  private $event;

  protected function setUp()
  {
    $event_data = array('name' => "Johnny's Day Date", 'epoch_time' => 1483387200000, 'utc_offset' => -25200000, 'group_name' => 'Everyone is happy', 'url' => 'https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/');
    $this->event = new Event($event_data);
  }

  protected function tearDown()
  {
    $this->event = NULL;
  }

  public function eventDataProvider() {
    return array(
      array('name'),
      array('group_name'),
      array('time'),
      array('url')
    );
  }

  /**
     * @dataProvider eventDataProvider
     */

  public function testeventHasAttributes($attribute)
  {
    $this->assertClassHasAttribute($attribute, 'Event');
  }

  /**
     * @dataProvider eventDataProvider
     */
  
  public function testeventAttributesNotEmpty($attribute)
  {
    $this->assertNotEquals('', $this->event->$attribute);
  } 

  public function testdisplay()
  {
    $expected = "\nName: Johnny's Day Date\nGroup name: Everyone is happy\nTime: 01-02-2017 @ 13:00\nUrl: https://www.meetup.com/Front-Range-Mind-Body-Fitness-Meetup/events/236488997/\n";
    $result = $this->event->display();

    $this->assertEquals($expected, $result);
  }

 
}

?>